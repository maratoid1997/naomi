<?php

namespace App\Models;

use App\Observers\MenuObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasFactory, HasTranslations, SortableTrait;

    const SECTION_HEADER = 1;
    const SECTION_FOOTER = 2;

    protected $fillable = [
        'name',
        'path',
        'section',
        'parent_id',
        'sort_order',
    ];

    protected $translatable = ['name','path'];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(MenuObserver::class);
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
}
