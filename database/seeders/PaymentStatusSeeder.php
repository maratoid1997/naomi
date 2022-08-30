<?php

namespace Database\Seeders;

use App\Models\Orders\PaymentStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => json_encode([
                    'az' => 'Ödənilib',
                    'en' => 'Paid',
                    'ru' => 'Ödənilib.',
                ]),
                'color' => '',
                'type' => PaymentStatus::STATUS_PAID,
            ],
            [
                'name' => json_encode([
                    'az' => 'Ödənilməyib',
                    'en' => 'Not paid',
                    'ru' => 'Ödənilməyib.',
                ]),
                'color' => '',
                'type' => PaymentStatus::STATUS_NOT_PAID,
            ],
            [
                'name' => json_encode([
                    'az' => 'Ödəniş qaytarıldı',
                    'en' => 'Refunded',
                    'ru' => 'Ödəniş qaytarıldı.',
                ]),
                'color' => '',
                'type' => PaymentStatus::STATUS_REFUND,
            ],
        ];

        Schema::disableForeignKeyConstraints();

        foreach ($statuses as $status){
            PaymentStatus::updateOrCreate(['type' => $status['type']],$status);
        }

        Schema::enableForeignKeyConstraints();
    }
}
