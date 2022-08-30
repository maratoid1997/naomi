<?php


namespace App\Services;


use App\Helpers\ActionHelper;
use App\Http\Resources\V1\Products\Cart\Cart;
use App\Http\Resources\V1\Products\ProductList;
use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TaxRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class CartService
{
    use ActionHelper;

    private CartRepository $cartRepository;
    private CartItemRepository $cartItemRepository;
    private ProductRepository $productRepository;
    private TaxRepository $taxRepository;

    public function __construct(CartRepository $cartRepository,
                                CartItemRepository $cartItemRepository,
                                ProductRepository $productRepository,
                                TaxRepository $taxRepository
    )
    {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
        $this->productRepository = $productRepository;
        $this->taxRepository = $taxRepository;
    }

    public function save($data){
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::CART);
        $customer = auth('api')->user()->customer;

        $cart = $this->cartRepository->save($customer->cart ? $customer->cart->id : null, [
            'customer_id' => $customer->id
        ]);

        $this->cartItemRepository->save(null, [
            'quantity' => $data['qty'],
            'product_id' => $data['productId'],
            'cart_id' => $cart->id,
        ]);

        return new ProductList($this->productRepository->find($data['productId']));
    }

    public function updateQuantity($data){
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::CART);
        return $this->cartItemRepository->updateQuantity($data);
    }

    public function deleteItem($productId, $customerId){
        $this->cartItemRepository->deleteByCustomerId($productId, $customerId);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::CART);
    }

    public function getCart(){
        $user = auth('api')->user();
        $cart = $user ? $user->customer->cart : null;
        $cartId = $cart ? $cart->id : 0;
        $cacheKey = \CacheHelper::CART.':'.$cartId.'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $cartData = $cart ? $this->cartItemRepository->getByCartId($cartId) : null;
        $data = [
            'products' => $cartData ? Cart::collection($cartData->items()) : [],
            'pagination' => $cartData ? [
                'total_count' => $cartData->total(),
                'current_page' => $cartData->currentPage(),
                'total_pages' => $cartData->lastPage(),
                'per_page' => $cartData->perPage()
            ] : [],
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.cart'),
                    'to' => '/cart'
                ],
            ],
            'taxes' => $this->mapTaxes($this->taxRepository->all())
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function getIdByCustomer($customerId){
        return $this->cartRepository->getIdByCustomer($customerId);
    }

    public function sync($products){

        $cart = auth('api')->user()->customer->cart;
        $cartId = $cart ? $cart->id : null;

        foreach ($products as $product){
           $this->cartRepository->syncItems($cartId, $product);
        }

        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);

        $cart = $this->cartItemRepository->getByCartId($cartId);
        return $cart ? [
            'products' => Cart::collection($cart->items()),
            'pagination' => [
                'total_count' => $cart->total(),
                'current_page' => $cart->currentPage(),
                'total_pages' => $cart->lastPage(),
                'per_page' => $cart->perPage()
            ]
        ] : [];
    }
}
