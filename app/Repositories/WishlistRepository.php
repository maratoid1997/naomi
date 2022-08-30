<?php


namespace App\Repositories;

use App\Repositories\Contractors\WishlistRepositoryInterface;
use App\Models\Products\Wishlist;


class WishlistRepository extends BaseRepository implements WishlistRepositoryInterface
{
    public function __construct(Wishlist $model)
    {
        parent::__construct($model);
    }

    public function getByCustomerId($customerId){
        return $this->model
            ->with([
                'product' => function($q){
                    $q->selectRaw('
                        id,
                        JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                        JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'")) as productSlug,
                        sku,
                        price,
                        category_id,
                        quantity,
                        sale_price,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
                    ')
                    ->with([
                        "category" => function($q){
                            $q->with('parent');
                        },
                    ])
                    ;
                },
            ])
            ->where('customer_id', $customerId)
            ->paginate(25);
    }

    public function deleteByUserId($productId, $customerId){
        return $this->model->where('product_id', $productId)->where( 'customer_id', $customerId)->delete();
    }

    public function sync($customerId, $productId){
        return $this->model
            ->updateOrCreate([
                'product_id' => $productId,
                'customer_id' => $customerId
            ],
                [
                    'product_id' => $productId,
                ]
            );
    }
}
