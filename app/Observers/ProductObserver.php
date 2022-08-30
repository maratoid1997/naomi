<?php

namespace App\Observers;

use App\Models\Products\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Products\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Products\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Products\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Products\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Products\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    public function saved(){
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }
}
