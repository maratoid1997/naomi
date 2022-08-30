<?php


namespace App\Services;

use App\Helpers\ActionHelper;
use App\Http\Resources\V1\Products\ProductDetail;
use App\Http\Resources\V1\Products\ProductList;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductService
{
    use ActionHelper;

    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;
    private BannerRepository $bannerRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->bannerRepository = $bannerRepository;
    }

    public function getLatest(){
        $cacheKey = \CacheHelper::PRODUCTS.'.latest.page:'.$this->getPageNumber().'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $products = $this->productRepository->latest();
        $data = [
            'products' => ProductList::collection($products),
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
                    'text' => __('nav.latestProducts'),
                    'to' => '/latest'
                ],
            ]
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function getDetails(String $slug){
        $cacheKey = \CacheHelper::PRODUCTS.'.'.$slug.'.details.'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $details = $this->productRepository->details($slug);
        $details->imageList = $this->getSpatieImageUrls($details->getMedia('productMultiImages'));
        $details->filters = $this->mapFiltersAndColor($details->filters, $details->color);
        $categoryBySlug = $this->categoryRepository->getBySlugWithLocalizations($details->category->parent->slug);

        $data = [
            'slugs' => $this->mapSlugs([
                'category' => json_decode($categoryBySlug->path),
                'product' => json_decode($this->productRepository->getBySlugWithLocalizations($details->productSlug)->path)
            ]),
            'details' => new ProductDetail($details),
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => $details->category->name,
                    'to' => '/'.$details->category->parent->slug
                ],
                [
                    'text' => $details->name,
                    'to' => '/'.$details->productSlug
                ],
            ],
            'tags' => $this->filterTags($details->tags)
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function getQuantity($id)
    {
        $cacheKey = \CacheHelper::PRODUCTS.'.'.$id.'.quantity.'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        return \CacheHelper::remember($cacheKey, json_encode($this->productRepository->getQuantity($id)));
    }

    public function getSaleProducts(){
        $cacheKey = \CacheHelper::PRODUCTS.'.sales.page:'.$this->getPageNumber().'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $products = $this->productRepository->getSaleProducts();
        $data = [
            'products' => ProductList::collection($products),
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
                    'text' => __('nav.saleProducts'),
                    'to' => '/sales'
                ],
            ]
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function filter($data)
    {
        $cacheKey = \CacheHelper::FILTER.':'.json_encode($data).'.page'.$this->getPageNumber().'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $hasChildren = $this->categoryRepository->hasChildren($data['category']);

        $products = $this->productRepository->filter($data, $hasChildren);
        $data = [
            'products' => ProductList::collection($products),
            'pagination' => [
                'total_count' => $products->total(),
                'current_page' => $products->currentPage(),
                'total_pages' => $products->lastPage(),
                'per_page' => $products->perPage()
            ],
            'banners' => $this->sortBannerByTypes($this->bannerRepository->all(), Banner::TYPE_SMALL)
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function search($term){

        $cacheKey = \CacheHelper::SEARCH.':'.json_encode($term).'.page'.$this->getPageNumber().'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $products = $this->productRepository->search($term);
        $data = [
            'products' => ProductList::collection($products),
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
                    'text' => __('nav.searchResults'),
                    'to' => '/results'
                ],
            ]
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function getSimilarProducts($data){
        $cacheKey = \CacheHelper::PRODUCTS.'.similar:'.'.locale:'.app()->getLocale().$data['productSlug'];

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $values = ProductList::collection($this->productRepository->getSimilarProducts($data['productSlug']));

        return \CacheHelper::remember($cacheKey, json_encode($values));
    }

    private function mapSlugs($data){
        $slugs = [];
        $locales = DB::table('locales')->select('code')->get();

        foreach ($locales as $locale){
            $code = $locale->code;

            $slugs[$locale->code] = $data['category']->$code.'/'.$data['product']->$code;
        }

        return $slugs;
    }

    private function filterTags($tags){
        $filteredTags = [];

        foreach ($tags as $tag){
            $filteredTags[] = json_decode($tag)->name->az;
        }

       return $filteredTags;
    }

    private function mapFiltersAndColor($filters, $color){
        $mappedData = [];

        $mappedData[__('static.color')] = $color->name;

        if ($filters){
            foreach ($filters as $filter) {
                if ($filter->parent)
                    $mappedData[$filter->parent->name] = $filter->name;
            }
        }

        return $mappedData;
    }
}
