<?php


namespace App\Services;


use App\Helpers\ActionHelper;
use App\Http\Resources\V1\Categories\Category;
use App\Http\Resources\V1\Products\ProductList;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class CategoryService
{
    use ActionHelper;

    private CategoryRepository $categoryRepository;
    private ProductRepository $productRepository;
    private BannerRepository $bannerRepository;

    public function __construct(CategoryRepository $categoryRepository,
                                ProductRepository $productRepository,
                                BannerRepository $bannerRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param $category: parent or child category slug
     * @param:boolean $byParentCategory
     * @return array
     */
    public function getSubCategories($category, $byParentCategory)
    {
        $cacheKey = \CacheHelper::CATEGORIES.':'.$category.'.byParent:'.$byParentCategory.'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $products = $this->productRepository->getProductsWithFilters($category, $byParentCategory);

        $categoryBySlug = $this->categoryRepository->getBySlug($category);

        $values = [
            'slugs' => $categoryBySlug->parent ?
                json_decode($this->categoryRepository->getBySlugWithLocalizations($categoryBySlug->parent->slug)->path) :
                json_decode($this->categoryRepository->getBySlugWithLocalizations($category)->path),
            'products' => ProductList::collection($products),
            'filters' => $products->items() ? $this->mapFilterFromProductList($products) : (object)[],
            'pagination' => [
                'total_count' => $products->total(),
                'current_page' => $products->currentPage(),
                'total_pages' => $products->lastPage(),
                'per_page' => $products->perPage()
            ],
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => $categoryBySlug->parent  ? $categoryBySlug->parent->name : $categoryBySlug->title,
                    'to' => $categoryBySlug->parent ? $categoryBySlug->parent->slug : $categoryBySlug->path,
                ],
            ],
            'banners' => $this->sortBannerByTypes($this->bannerRepository->all(),Banner::TYPE_SMALL)
        ];

        if($byParentCategory){
            $values['subCategories'] = Category::collection($this->categoryRepository->getSubCategories($category));
        }

        return \CacheHelper::remember($cacheKey, json_encode($values));
    }

    private function mapFilterFromProductList($products): array
    {
        $filters = [];
        $filters['dynamic'] = [];

        foreach ($products as $productKey => $product){

            foreach ($product->filters as $key => $filter){
                if ($filter->parent)
                    $filters['dynamic'][$filter->parent->name][$filter->id] = [
                        'id' => $filter->id,
                        'name' => $filter->name,
                    ];
            }

            $filters['brands'][$product->brand->id] = [
                'id' => $product->brand->id,
                'name' => $product->brand->name,
            ];

            $filters['colors'][$product->color->id] = [
                'id' => $product->color->id,
                'name' => $product->color->name,
                'value' => $product->color->value,
            ];
        }

        $dynamic = $filters['dynamic'];

        unset($filters['dynamic']);

        foreach ($filters as $key => $filter){
            $filters[$key] = array_values($filter);
        }

        $filters['dynamic'] = $dynamic;

        foreach ($filters['dynamic'] as $key => $filter){
            $filters['dynamic'][$key] = array_values($filter);
        }

        $filters['price_range'] = [
            'max' => floatval($products->max('price')),
            'min' => floatval($products->min('price')),
        ];

        return $filters;
    }
}
