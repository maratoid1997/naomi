<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class PaymentType extends Model
{
    use HasFactory, HasTranslations;

    const CARD = 1;
    const BIRKART = 2;
    const CASH = 3;

    protected $table = 'payment_types';
    protected $fillable = ['name', 'type_key'];

    public $translatable = ['name'];

    public function orders(){
        return $this->hasMany(Order::class,'payment_type_id');
    }
}
