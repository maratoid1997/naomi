<?php


namespace App\Services;


use App\Helpers\ActionHelper;
use App\Http\Resources\V1\Products\Wishlist;
use App\Repositories\ProductRepository;
use App\Repositories\WishlistRepository;

class WishlistService
{
    use ActionHelper;

    private WishlistRepository $wishlistRepository;
    private ProductRepository $productRepository;

    public function __construct(WishlistRepository $wishlistRepository, ProductRepository $productRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
        $this->productRepository = $productRepository;
    }

    public function getByCustomerId(){
        $user = auth('api')->user();
        $customerId = $user ? $user->customer->id : 0;

        $cacheKey = \CacheHelper::WISHLIST.'.customer:'.$customerId.'.page'.$this->getPageNumber().".locale:".app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $products  = $this->wishlistRepository->getByCustomerId($customerId);
        $data = [
            'products' => $products ? Wishlist::collection($products->items()) : [],
            'pagination' => $products ? [
                'total_count' => $products->total(),
                'current_page' => $products->currentPage(),
                'total_pages' => $products->lastPage(),
                'per_page' => $products->perPage()
            ] : [],
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.wishlist'),
                    'to' => '/wishlist'
                ],
            ]
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function save($data){
        $this->wishlistRepository->save(null,[
            'customer_id' => $data['customerId'],
            'product_id' => $data['productId']
        ]);

        \CacheHelper::delete(\CacheHelper::WISHLIST);
        return $this->productRepository->getWishlistProducts($data['productId']);
    }

    public function delete($productId, $customerId){
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        return $this->wishlistRepository->deleteByUserId($productId, $customerId);
    }

    public function sync($products){

        $customerId = auth('api')->user()->customer->id;
        foreach ($products as $product){
            $this->wishlistRepository->sync($customerId, $product['id']);
        }

        \CacheHelper::delete(\CacheHelper::WISHLIST);

        $cacheKey = \CacheHelper::WISHLIST.'.customer:'.$customerId.'.page'.$this->getPageNumber().".locale:".app()->getLocale();

        $wishlistProducts = $this->wishlistRepository->getByCustomerId($customerId);

        $data = $wishlistProducts ? [
            'products' => Wishlist::collection($wishlistProducts->items()),
            'pagination' => [
                'total_count' => $wishlistProducts->total(),
                'current_page' => $wishlistProducts->currentPage(),
                'total_pages' => $wishlistProducts->lastPage(),
                'per_page' => $wishlistProducts->perPage()
            ]
        ] : [];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }
}
