<?php

namespace Database\Seeders;

use App\Models\Orders\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => json_encode([
                    'az' => 'Plastik kart',
                    'en' => 'Plastic card',
                    'ru' => 'Пластиковая карта',
                ]),
                'type_key' => PaymentType::CARD,
            ],
            [
                'name' => json_encode([
                    'az' => 'Birkart',
                    'en' => 'Birkart',
                    'ru' => 'Birkart',
                ]),
                'type_key' => PaymentType::BIRKART,
            ],
            [
                'name' => json_encode([
                    'az' => 'Nağd',
                    'en' => 'Cash',
                    'ru' => 'Наличные',
                ]),
                'type_key' => PaymentType::CASH,
            ],
        ];

        if(!PaymentType::all()->count()){
            PaymentType::insert($types);
        }
    }
}
