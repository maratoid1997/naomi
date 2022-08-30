<?php

namespace App\Observers;

class ContactObserver
{
    public function created()
    {
        \CacheHelper::delete(\CacheHelper::PAGES);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
    }

    public function updated(){
        \CacheHelper::delete(\CacheHelper::PAGES);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
    }

    public function saved(){
        \CacheHelper::delete(\CacheHelper::PAGES);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
    }

    public function saving(){
        \CacheHelper::delete(\CacheHelper::PAGES);
        \CacheHelper::delete(\CacheHelper::CATEGORIES);
    }
}
