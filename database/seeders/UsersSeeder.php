<?php

namespace Database\Seeders;

use App\Models\Customers\Customer;
use App\Models\Images\Image;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Customer::flushEventListeners();
        Customer::firstOrCreate(['phone' => '994999999999'],[
            'fullname' => 'Test Testovic',
            'address' => 'Azerbaijan Baku',
            'phone' => '994999999999',
            'user_id' => User::firstOrCreate(['email' => 'test@test.com'],[
                'email' => 'test@test.com',
                'password' => Hash::make(12345678),
                'login_type' => User::LOGIN_TYPE_LOCAL
            ])->id,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
