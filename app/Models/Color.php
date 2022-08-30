<?php

namespace App\Models;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Color extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'value',
    ];

    protected $translatable = ['name'];

    public function products(){
        return $this->hasMany(Product::class,'color_id');
    }
}
