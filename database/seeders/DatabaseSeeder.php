<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LocalesSeeder::class,
            UsersSeeder::class,
            PermissionSeeder::class,
            ContactSeeder::class,
            CurrencySeeder::class,
            TaxSeeder::class,
            DeliveryTypesSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            OrderStatusSeeder::class,
            PaymentTypeSeeder::class,
            CitySeeder::class,
            PaymentStatusSeeder::class,
        ]);
    }
}
