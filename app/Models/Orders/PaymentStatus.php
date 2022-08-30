<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PaymentStatus extends Model
{
    use HasFactory, HasTranslations;

    const STATUS_NOT_PAID = 0;
    const STATUS_PAID = 1;
    const STATUS_REFUND = 2;

    protected $fillable = [
        'name',
        'color',
        'type'
    ];

    public $translatable = [
        'name'
    ];
}
