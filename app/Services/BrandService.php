<?php


namespace App\Services;


use App\Http\Resources\V1\Products\Brand;
use App\Http\Resources\V1\Products\ProductList;
use App\Repositories\BrandRepository;
use App\Repositories\ProductRepository;

class BrandService
{
    private BrandRepository $brandRepository;
    private ProductRepository $productRepository;

    public function __construct(
        BrandRepository $brandRepository,
        ProductRepository $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
    }

    public function getAll(){
        return [
            'brands' => Brand::collection($this->brandRepository->all()),
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.brands'),
                    'to' => '/brands'
                ],
            ]
        ];
    }

    public function getProducts($brandId){
        $products = $this->productRepository->getByBrandId($brandId);
        return [
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
                    'text' => __('nav.brands'),
                    'to' => '/brands'
                ],
                [
                    'text' => __('nav.products'),
                    'to' => '/products'
                ],
            ]
        ];
    }
}
