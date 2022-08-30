<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    const TYPE_SMALL = 'Small';
    const TYPE_MEDIUM = 'Medium';
    const TYPE_LARGE = 'Large';

    const PUBLISHED = 1;

    protected $fillable = [
        'title',
        'url',
        'type',
        'start_date',
        'end_date',
    ];

    public $translatable = ['title'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('bannerImages')->singleFile();
    }
}
