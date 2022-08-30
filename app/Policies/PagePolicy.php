<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function delete(User $user, Page $page){

        if($page->slug == Page::PAGE_COMPANY_INFO_SLUG
            || $page->slug == Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_AZ
            || $page->slug == Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_EN
            || $page->slug == Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_RU
        )
        {
            return false;
        }
        return true;
    }

    public function create(){
        return true;
    }

    public function update(User $user, Page $page){
//        if($page->slug == Page::PAGE_COMPANY_INFO_SLUG
//            || $page->slug == Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_AZ
//            || $page->slug == Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_EN
//            || $page->slug == Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_RU
//        )
//        {
//            return false;
//        }
        return true;
    }

    public function view(){
        return true;
    }
}
