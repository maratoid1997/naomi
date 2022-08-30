<?php

namespace Database\Seeders;

use App\Models\Orders\DeliveryType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DeliveryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DeliveryType::truncate();
        Schema::enableForeignKeyConstraints();

        $deliveryTypes = [
            [
                'name' => json_encode([
                    'az' => '3 gün ərzində(5 manat)',
                    'en' => 'In 3 days (5 manat)',
                    'ru' => 'In 3 days (5 manat)',
                ]),
                'rate' => doubleval(5),
                'type' => DeliveryType::DELIVERY_BY_SHOP
            ],
            [
                'name' => json_encode([
                    'az' => 'Gün ərzində',
                    'en' => 'During today',
                    'ru' => 'During today',
                ]),
                'rate' => doubleval(3),
                'type' => DeliveryType::DELIVERY_BY_SHOP
            ],
            [
                'name' => json_encode([
                    'az' => 'Özü götürmə',
                    'en' => 'By yourself',
                    'ru' => 'By yourself',
                ]),
                'rate' => doubleval(0),
                'type' => DeliveryType::DELIVERY_NOT_BY_SHOP
            ],
        ];

        DeliveryType::insert($deliveryTypes);
    }
}
