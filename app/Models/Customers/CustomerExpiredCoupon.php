<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerExpiredCoupon extends Model
{
    use HasFactory;

    protected $table = 'customer_expired_coupons';

    protected $fillable = ['customer_id', 'coupon_id'];
}
