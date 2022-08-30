<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Currency::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            [
                'code' => Currency::AZN,
                'rate' => 1
            ],
            [
                'code' => Currency::USD,
                'rate' => cbar()->USD
            ],
            [
                'code' => Currency::RUB,
                'rate' => cbar()->RUB
            ],
        ];

        Currency::insert($data);
    }
}
