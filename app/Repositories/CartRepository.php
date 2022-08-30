<?php


namespace App\Repositories;


use App\Repositories\Contractors\CartRepositoryInterface;
use App\Models\Products\Carts\Cart;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(Cart $model)
    {
        parent::__construct($model);
    }

    public function getIdByCustomer($customerId){
        $cart = $this->model->where('customer_id', $customerId)->first();
        return $cart ? $cart->id : 0;
    }

    public function syncItems($cartId, $product){
        return $this->find($cartId)
            ->items()
            ->updateOrCreate([
                    'product_id' => $product['id'],
                ],
                [
                    'product_id' => $product['id'],
                    'quantity' => $product['count'],
                ]
            );
    }
}
