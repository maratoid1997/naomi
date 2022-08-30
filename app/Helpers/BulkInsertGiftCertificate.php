<?php


namespace App\Helpers;


use App\Models\Orders\GiftCertificate;
use Illuminate\Support\Str;

trait BulkInsertGiftCertificate
{
    public function __construct()
    {
        $data = request()->all();
        $this->giftCertificateInsert($data);
    }

    public function giftCertificateInsert($giftCertificate){
        if($giftCertificate['quantity'] == null){
            $this->create([
                'code' => $giftCertificate['code'] ?? Str::random(6),
                'price' => $giftCertificate['price'],
                'start_date' => $giftCertificate['start_date'],
                'end_date' => $giftCertificate['end_date'],
            ]);

        }else{
            for($i = 0; $i < $giftCertificate['quantity']; $i++){
                $this->create([
                    'code' => Str::random(6),
                    'price' => $giftCertificate['price'],
                    'start_date' => $giftCertificate['start_date'],
                    'end_date' => $giftCertificate['end_date'],
                ]);
            }
        }
    }
}
