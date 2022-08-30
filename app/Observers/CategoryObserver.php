<?php

namespace App\Observers;

use App\Models\Categories\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
        \CacheHelper::delete(\CacheHelper::PRODUCTS);
        \CacheHelper::delete(\CacheHelper::WISHLIST);
        \CacheHelper::delete(\CacheHelper::FILTER);
        \CacheHelper::delete(\CacheHelper::CART);
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::SEARCH);
    }
}
