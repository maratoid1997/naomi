<?php

namespace App\Models\Customers\Addresses;

use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers\City;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'address',
        'floor',
        'city_id',
        'post_code',
        'phone',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
