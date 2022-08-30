<?php

namespace App\Observers;

use App\Models\Products\Wishlist;

class WishlistObserver
{
    /**
     * Handle the wishlist "created" event.
     *
     * @param  \App\Models\Products\Wishlist  $wishlist
     * @return void
     */
    public function created(Wishlist $wishlist)
    {
        \CacheHelper::delete(\CacheHelper::WISHLIST);
    }

    /**
     * Handle the wishlist "updated" event.
     *
     * @param  \App\Models\Products\Wishlist  $wishlist
     * @return void
     */
    public function updated(wishlist $wishlist)
    {
        \CacheHelper::delete(\CacheHelper::WISHLIST);
    }

    /**
     * Handle the wishlist "deleted" event.
     *
     * @param  \App\Models\Products\Wishlist  $wishlist
     * @return void
     */
    public function deleted(wishlist $wishlist)
    {
        \CacheHelper::delete(\CacheHelper::WISHLIST);
    }

    /**
     * Handle the wishlist "restored" event.
     *
     * @param  \App\Models\Products\Wishlist  $wishlist
     * @return void
     */
    public function restored(wishlist $wishlist)
    {
        \CacheHelper::delete(\CacheHelper::WISHLIST);
    }

    /**
     * Handle the wishlist "force deleted" event.
     *
     * @param  \App\Models\Products\Wishlist  $wishlist
     * @return void
     */
    public function forceDeleted(wishlist $wishlist)
    {
        \CacheHelper::delete(\CacheHelper::WISHLIST);
    }
}
