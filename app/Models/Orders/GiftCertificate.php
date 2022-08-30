<?php

namespace App\Models\Orders;

use App\Helpers\BulkInsertGiftCertificate;
use App\Observers\GiftCertificateObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GiftCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'price',
        'start_date',
        'end_date',
    ];

    protected $casts = ['start_date' => 'datetime', 'end_date' => 'datetime'];

    protected static function boot()
    {
        parent::boot();
        $storableData = [];

        if (request()->editMode == 'create'){
            $giftCertificate = request()->all();
            if(isset($giftCertificate['quantity']) && $giftCertificate['quantity'] != null){
                for($i = 0; $i < $giftCertificate['quantity']; $i++) {
                    $storableData[] = [
                        'code' => Str::random(6),
                        'price' => $giftCertificate['price'],
                        'start_date' => $giftCertificate['start_date'],
                        'end_date' => $giftCertificate['end_date'],
                    ];
                }
                self::insert($storableData);
            }
        }
        self::observe(GiftCertificateObserver::class);
    }
}
