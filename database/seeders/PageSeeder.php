<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fix after deploy
        Page::truncate();

        if(Page::all()->count() > 0) return;

        $pages = [
            [
                'title' => json_encode([
                    'az' => 'Çatdırılma və ödəmə',
                    'en' => 'Shipping and payment',
                    'ru' => 'Shipping and payment',
                ]),
                'description' => json_encode([
                    'az' => 'this is description',
                    'en' => 'this is description',
                    'ru' => 'this is description',
                ]),
                'slug' => json_encode([
                    'az' => Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_AZ,
                    'en' => Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_EN,
                    'ru' => Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_RU,
                ]),
                'published' => true,
            ],
            [
                'title' => json_encode([
                    'az' => 'Company info',
                    'en' => 'Company info',
                    'ru' => 'Company info',
                ]),
                'description' => json_encode([
                    'az' => 'Onlayn mağazamız istənilən nəqliyyat şirkəti tərəfindən ölkə daxilində sifarişlər verilir. Bölgədə sifarişlər öz kuryer çatdırılma xidmətimiz tərəfindən çatdırılır.',
                    'en' => 'Our online store delivers orders throughout the country by any transport company. In the area, orders are delivered by our own courier delivery service',
                    'ru' => 'Наш интернет-магазин доставляет заказы по всей Стране любой транспортной компанией. В области заказы доставляет собственная курьерская служба доставки',
                ]),
                'slug' => json_encode([
                    'az' => Page::PAGE_COMPANY_INFO_SLUG,
                    'en' => Page::PAGE_COMPANY_INFO_SLUG,
                    'ru' => Page::PAGE_COMPANY_INFO_SLUG,
                ]),
                'published' => true,
            ],
        ];

        Page::insert($pages);
    }
}
