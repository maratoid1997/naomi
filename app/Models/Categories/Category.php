<?php

namespace App\Models\Categories;

use App\Models\Images\Image;
use App\Models\Orders\CategoryCoupon;
use App\Models\Orders\Coupon;
use App\Models\Products\Product;
use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;
use Spatie\EloquentSortable\SortableTrait;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations, SortableTrait;

    protected $fillable = [
        'name',
        'slug',
        'cover_image_id',
        'parent_id',
        '_lft',
        '_rgt',
    ];

    public $translatable = ['name', 'slug'];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(CategoryObserver::class);
    }

    public function cover(){
        return $this->belongsTo(Image::class,'cover_image_id');
    }

    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children(){
        return $this->hasMany(self::class, 'parent_id')
            ->with('children')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categoryImages')->singleFile();
    }

    public function scopeSelectTranslate($query, array $keys = [])
    {
        foreach ($keys as $key) {
            $name = $key == 'slug' ? 'path' : $key;

            if (in_array($key, $this->getTranslatableAttributes()))
                $query->selectRaw('JSON_EXTRACT('.$key.', "$.'.app()->getLocale().'") as '.$name);
        }

        return $query;
    }

    public function coupons(){
        return $this->belongsToMany(Coupon::class,CategoryCoupon::class);
    }
}
