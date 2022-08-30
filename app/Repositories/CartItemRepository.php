<?php


namespace App\Repositories;


use App\Repositories\Contractors\CartItemRepositoryInterface;
use App\Models\Products\Carts\CartItem;


class CartItemRepository extends BaseRepository implements CartItemRepositoryInterface
{
    public function __construct(CartItem $model)
    {
        parent::__construct($model);
    }

    public function updateQuantity($data){
        return $this->model->where('product_id', $data['productId'])
            ->whereHas('cart', function ($q) use ($data){
                $q->where('customer_id', $data['userId']);
            })
            ->update(['quantity' => $data['qty']]);
    }

    public function deleteByCustomerId($productId, $customerId){
        return $this->model
            ->where('product_id', $productId)
            ->whereHas('cart', function ($q) use ($customerId){
                $q->where('customer_id', $customerId);
            })->delete();
    }

    public function getByCartId($cartId){
        return $this->model->where('cart_id', $cartId)
            ->with(['product' => function($q){
                $q->selectRaw('
                    id,
                    JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                    JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'")) as productSlug,
                    sku,
                    price,
                    category_id,
                    quantity as productQuantity,
                    sale_price,
                    (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                    (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
                ')
                ->with([
                    "category" => function($q){
                        $q->with('parent');
                    },
                ]);

            }])
            ->paginate(25);
    }

    public function emptyCart($cartId){
        $this->model->where('cart_id', $cartId)->delete();
    }
}
