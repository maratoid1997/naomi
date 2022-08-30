<?php

namespace App\Models\Orders;

use App\Models\Categories\Category;
use App\Observers\CouponObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'rate',
        'one_time',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'one_time' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(CouponObserver::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,CategoryCoupon::class);
    }
}
