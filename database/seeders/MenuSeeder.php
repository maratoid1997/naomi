<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //change after deploying to server
        Menu::truncate();
        if(!Menu::all()->count()){
            $menus = [
                [
                    'name' => json_encode([
                        'az' => 'Brendlər',
                        'en' => 'Brands',
                        'ru' => 'Brands',
                    ]),
                    'path' => json_encode([
                        'az' => '/brands',
                        'en' => '/brands',
                        'ru' => '/brands',
                    ]),
                    'section' => Menu::SECTION_HEADER,
                    'parent_id' => null
                ],
                [
                    'name' => json_encode([
                        'az' => 'Endirimlər',
                        'en' => 'Sales',
                        'ru' => 'Sales',
                    ]),
                    'path' => json_encode([
                        'az' => '/sales',
                        'en' => '/sales',
                        'ru' => '/sales',
                    ]),
                    'section' => Menu::SECTION_HEADER,
                    'parent_id' => null
                ],
                [
                    'name' => json_encode([
                        'az' => 'Çatdırılma və ödəniş',
                        'en' => 'Shipping and payment',
                        'ru' => 'Shipping and payment',
                    ]),
                    'path' => json_encode([
                        'az' => '/'.Page::PAGE_SHIPPING_AND_PAYMENT_SLUG,
                        'en' => '/'.Page::PAGE_SHIPPING_AND_PAYMENT_SLUG,
                        'ru' => '/'.Page::PAGE_SHIPPING_AND_PAYMENT_SLUG,
                    ]),
                    'section' => Menu::SECTION_HEADER,
                    'parent_id' => null
                ],
                [
                    'name' => json_encode([
                        'az' => 'Əlaqə',
                        'en' => 'Contact',
                        'ru' => 'Contact',
                    ]),
                    'path' => json_encode([
                        'az' => '/contact',
                        'en' => '/contact',
                        'ru' => '/contact',
                    ]),
                    'section' => Menu::SECTION_HEADER,
                    'parent_id' => null
                ],
            ];

            Menu::insert($menus);
        }
    }
}
