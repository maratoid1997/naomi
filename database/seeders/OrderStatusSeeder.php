<?php

namespace Database\Seeders;

use App\Models\Orders\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderStatusSeeder extends Seeder
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
                    'az' => 'Tamamlandı',
                    'en' => 'Finished',
                    'ru' => 'Сделанный.',
                ]),
                'color' => Status::COLOR_STATUS_FINISHED,
                'type' => Status::STATUS_FINISHED,
            ],

            [
                'name' => json_encode([
                    'az' => 'Təsdiqləndi',
                    'en' => 'Approved',
                    'ru' => 'Təsdiqləndi.',
                ]),
                'color' => '',
                'type' => Status::STATUS_APPROVED,
            ],
            [
                'name' => json_encode([
                    'az' => 'Sifariş hazırlanır',
                    'en' => 'Order is preparing',
                    'ru' => 'Sifariş hazırlanır.',
                ]),
                'color' => '',
                'type' => Status::STATUS_PREPARING,
            ],
            [
                'name' => json_encode([
                    'az' => 'Sifariş hazırdır',
                    'en' => 'Order is ready',
                    'ru' => 'Sifariş hazırdır',
                ]),
                'color' => '',
                'type' => Status::STATUS_READY,
            ],
            [
                'name' => json_encode([
                    'az' => 'Kuryerə təhvil verildi',
                    'en' => 'Handed over courier',
                    'ru' => 'Kuryerə təhvil verildi',
                ]),
                'color' => '',
                'type' => Status::STATUS_HANDED_OVER_COURIER,
            ],
            [
                'name' => json_encode([
                    'az' => 'Kuryer təhvil verdi',
                    'en' => 'Courier handed over',
                    'ru' => 'Kuryer təhvil verdi',
                ]),
                'color' => '',
                'type' => Status::STATUS_COURIER_HANDED_OVER,
            ],
            [
                'name' => json_encode([
                    'az' => 'Təhvil verildi',
                    'en' => 'Handed over',
                    'ru' => 'Təhvil verildi',
                ]),
                'color' => '',
                'type' => Status::STATUS_HANDED_OVER,
            ],
            [
                'name' => json_encode([
                    'az' => 'Anbara qaytarıldı',
                    'en' => 'Returned to warehouse',
                    'ru' => 'Anbara qaytarıldı',
                ]),
                'color' => '',
                'type' => Status::STATUS_RETURNED_WAREHOUSE,
            ],
        ];

        Schema::disableForeignKeyConstraints();
        foreach ($statuses as $status){
            Status::updateOrCreate(['type' => $status['type']],$status);
        }
        Schema::enableForeignKeyConstraints();
    }
}
