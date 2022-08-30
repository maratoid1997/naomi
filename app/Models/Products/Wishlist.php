<?php

namespace App\Models\Products;

use App\Models\Products\Product;
use App\Observers\WishlistObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $fillable = [
        'customer_id',
        'product_id',
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(WishlistObserver::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
