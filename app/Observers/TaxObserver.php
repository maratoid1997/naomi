<?php

namespace App\Observers;

class TaxObserver
{
    public function saved(){
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
    }

    public function saving(){
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
    }

    public function deleted(){
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
    }
}
