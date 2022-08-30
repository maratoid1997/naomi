<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();
        Contact::create([
            'address' => 'Test',
            "phone1" => "994998888888",
            "phone2" => "994124438888",
            "email" => "test@gmail.com",
        ]);
    }
}
