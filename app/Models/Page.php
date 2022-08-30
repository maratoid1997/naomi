<?php

namespace App\Models;

use App\Observers\PageObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    const PUBLISHED = 1;

    const PAGE_COMPANY_INFO_SLUG= 'company-info';

    const PAGE_SHIPPING_AND_PAYMENT_SLUG = 'shipping-payment';

    const PAGE_SHIPPING_AND_PAYMENT_SLUG_AZ = 'catdirilma-ve-odeme';
    const PAGE_SHIPPING_AND_PAYMENT_SLUG_EN = 'shipping-payment';
    const PAGE_SHIPPING_AND_PAYMENT_SLUG_RU = 'dostavaka-i-oplata';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'published'
    ];

    public array $translatable = ['title', 'description', 'slug'];

    protected static function boot()
    {
        parent::boot();
        self::observe(PageObserver::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pageImages')->singleFile();
    }
}
