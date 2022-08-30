<?php

namespace App\Vendor;

use App\Nova\ApplicationForm;
use App\Nova\Banner;
use App\Nova\Brand;
use App\Nova\Category;
use App\Nova\Color;
use App\Nova\Contact;
use App\Nova\Coupon;
use App\Nova\Customer;
use App\Nova\DeliveryType;
use App\Nova\Filter;
use App\Nova\GiftCertificate;
use App\Nova\Menu;
use App\Nova\Order;
use App\Nova\Page;
use App\Nova\Product;
use App\Nova\Slider;
use App\Nova\StoreAddress;
use App\Nova\Tax;
use Laravel\Nova\Nova;
use Laravel\Nova\Tools\ResourceManager as NovaResourceManager;

class ResourceManager extends NovaResourceManager
{

    /**
     * Build the view that renders the navigation links for the tool.
     */
    public function renderNavigation()
    {
        $request = request();
        $groups = Nova::groups($request);
//        $navigation = Nova::groupedResourcesForNavigation($request);

        $newNavigation = collect([
            'Others' => collect([
                Menu::class,
                Tax::class,
            ]),
            'MAIN PAGES' => collect([
                Page::class,
                Product::class,
                Slider::class,
            ]),
            'Category' => collect([
                Category::class,
                Filter::class,
                Brand::class,
                Banner::class,
                Color::class,
            ]),
            'Orders' => collect([
                Order::class,
                Coupon::class,
                GiftCertificate::class,
                DeliveryType::class,
                StoreAddress::class,
            ]),
            'Settings' => collect([
                Customer::class,
                Contact::class,
                ApplicationForm::class,
            ]),
        ]);
        return view('nova::resources.navigation', [
            'navigation' => $newNavigation,
            'groups' => $groups,
        ]);
    }
}
