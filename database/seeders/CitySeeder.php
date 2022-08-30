<?php

namespace Database\Seeders;

use App\Models\Customers\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!City::all()->count()){
            $citiesJson = File::get('database/custom/azerbaijan-cities.json');

            foreach (json_decode($citiesJson, true) as $cityJson) {
                City::create([
                    'name' => $cityJson['city'],
                    'iso2' => $cityJson['iso2'],
                ]);
            }

        }
    }
}
