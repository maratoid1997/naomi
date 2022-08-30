<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DeliveryType extends Model
{
    use HasFactory, HasTranslations;

    const DELIVERY_NOT_BY_SHOP = 1;
    const DELIVERY_BY_SHOP = 0;

    protected $table = 'delivery_types';

    protected $fillable = [
        'name',
        'rate',
        'type'
    ];

    protected $translatable = ['name'];
}
