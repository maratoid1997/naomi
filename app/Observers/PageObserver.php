<?php

namespace App\Observers;

use App\Models\Page;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
        \CacheHelper::delete(\CacheHelper::PAGES);
    }

    /**
     * Handle the Page "updated" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        \CacheHelper::delete(\CacheHelper::PAGES);
    }

    /**
     * Handle the Page "deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        \CacheHelper::delete(\CacheHelper::PAGES);
    }

    /**
     * Handle the Page "restored" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        \CacheHelper::delete(\CacheHelper::PAGES);
    }

    /**
     * Handle the Page "force deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        \CacheHelper::delete(\CacheHelper::PAGES);
    }

    public function updating(Page $page){
        if($page->id == 1 || $page->id == 2){
            unset($page->slug);
        }
    }
}
