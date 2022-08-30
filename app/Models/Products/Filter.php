<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class Filter extends Model
{
    use HasFactory, HasTranslations, NodeTrait;
    protected $table = 'filters';

    protected $fillable = [
        'name'
    ];

    public $translatable = ['name'];

    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children(){
        return $this->hasMany(self::class, 'parent_id')
            ->with('children')
            ->orderBy('position')
            ->orderBy('id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,ProductFilter::class);
    }

    public function toArray()
    {
        return array_merge(parent::toArray(),[ 'translated_name' => $this->name]);
    }
}
