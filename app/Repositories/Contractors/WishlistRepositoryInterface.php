<?php


namespace App\Repositories\Contractors;


interface WishlistRepositoryInterface
{
    public function getByCustomerId($customerId);
    public function deleteByUserId($productId, $userId);
}
