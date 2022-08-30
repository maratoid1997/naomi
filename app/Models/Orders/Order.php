<?php

namespace App\Models\Orders;

use App\Models\Currency;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'fullname',
        'email',
        'shipping_address',
        'phone',
        'store_address_id',
        'status_id',
        'delivery_type_id',
        'gift_certificate_id',
        'coupon_id',
        'subtotal',
        'total',
        'quantity_total',
        'payment_type_id',
        'currency_id',
        'payment_status_id'
    ];

    public function items(){
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function deliveryType(){
        return $this->belongsTo(DeliveryType::class,'delivery_type_id');
    }

    public function giftCertificate(){
        return $this->belongsTo(DeliveryType::class,'gift_certificate_id');
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class,'coupon_id');
    }

    public function storeAddress(){
        return $this->belongsTo(StoreAddress::class,'store_address_id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public function status(){
        return $this->belongsTo(Status::class,'status_id');
    }

    public function paymentStatus(){
        return $this->belongsTo(PaymentStatus::class,'payment_status_id');
    }

    public function paymentType(){
        return $this->belongsTo(PaymentType::class,'payment_type_id');
    }
}
