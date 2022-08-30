<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'kapital_order_id',
        'session_id',
        'currency',
        'order_status',
        'order_description',
        'amount',
        'payment_url',
        'status_code',
        'order_check_status',
        'language_code'
    ];

    protected $serviceUrl = 'https://e-commerce.kapitalbank.az:5443/Exec';
    protected $cert = 'kapitalbank/testmerchant.crt';
    protected $key = 'kapitalbank/merchant_name.key';
    protected $merchant_id = 'E1000010';
    const PORT = 5443;

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
