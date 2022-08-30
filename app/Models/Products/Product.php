<?php

namespace App\Models\Products;

use App\Models\Campaigns\Campaign;
use App\Models\Categories\Category;
use App\Models\Color;
use App\Models\Images\Image;
use App\Models\Products\Carts\CartItem;
use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;
use Spatie\Translatable\HasTranslations;


class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, HasTags;

    const SORT_NEW = 1;
    const SORT_LOWEST_PRICE = 2;
    const SORT_HIGHEST_PRICE = 3;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'sku',
        'price',
        'quantity',
        'sale_price',
        'brand_id',
    ];

    protected $translatable = ['title', 'description', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($product) {
            if(!isset($product->getTranslations('title')['en'])){
                $az = $product->getTranslations('title')['az'];
                $product->setTranslation('title', 'en', $az);
            }
            if(!isset($product->getTranslations('slug')['en'])){
                $az = $product->getTranslations('slug')['az'];
                $product->setTranslation('slug', 'en', $az);
            }
            if(!isset($product->getTranslations('description')['en'])){
                $az = $product->getTranslations('description')['az'];
                $product->setTranslation('description', 'en', $az);
            }
        });

        static::updating(function($product) {
            if(!isset($product->getTranslations('title')['en'])){
                $az = $product->getTranslations('title')['az'];
                $product->setTranslation('title', 'en', $az);
            }
            if(!isset($product->getTranslations('slug')['en'])){
                $az = $product->getTranslations('slug')['az'];
                $product->setTranslation('slug', 'en', $az);
            }
            if(!isset($product->getTranslations('description')['en'])){
                $az = $product->getTranslations('description')['az'];
                $product->setTranslation('description', 'en', $az);
            }
        });

        self::observe(ProductObserver::class);
    }

    public function images(){
        return $this->belongsToMany(Image::class, ProductImage::class)->wherePivot('type',ProductImage::SECONDARY_TYPE);
    }

    public function mainImage(){
        return $this->belongsToMany(Image::class,ProductImage::class)->wherePivot('type',ProductImage::MAIN_TYPE);
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function cartItem(){
        return $this->hasMany(CartItem::class, 'product_id');
    }

    public function campaigns(){
        return $this->belongsToMany(Campaign::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('productMainImage')->singleFile();
        $this->addMediaCollection('productMultiImages');
    }

    public function filters(){
        return $this->belongsToMany(Filter::class,ProductFilter::class);
    }

    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }

    public function favorite(){
        return $this->hasMany(Wishlist::class,'product_id');
    }

    public function similar(){
        return $this->belongsToMany(self::class, SimilarProduct::class, 'product_id','attachment_id');
    }
}
