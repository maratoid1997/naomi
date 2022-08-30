<?php

namespace Database\Seeders;

use App\Models\Settings\Tax;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tax::truncate();
        Schema::enableForeignKeyConstraints();

        $taxes = [
            [
                'name' => Tax::VAT,
                'rate' => 18
            ],
            [
                'name' => Tax::ECO,
                'rate' => 10
            ],
        ];

        Tax::insert($taxes);
    }
}
