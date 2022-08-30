<?php

namespace App\Providers;

use App\Models\Categories\Category;
use App\Models\Contact;
use App\Models\Locale;
use App\Models\Page;
use App\Models\Products\Filter;
use App\Models\Products\Wishlist;
use App\Models\Settings\Tax;
use App\Observers\WishlistObserver;
use App\Policies\CategoryPolicy;
use App\Policies\ContactPolicy;
use App\Policies\FilterPolicy;
use App\Policies\LocalePolicy;
use App\Policies\MenuPolicy;
use App\Models\Menu;
use App\Policies\PagePolicy;
use App\Policies\TaxPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Menu::class => MenuPolicy::class,
        Page::class => PagePolicy::class,
        Contact::class => ContactPolicy::class,
        Tax::class => TaxPolicy::class,
        Filter::class => FilterPolicy::class,
        Locale::class => LocalePolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerPolicies();

        //
    }
}
