<?php

namespace App\Models\Settings;

use App\Observers\TaxObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    const VAT = 'vat';
    const ECO = 'eco';

    protected $table = 'taxes';
    protected $fillable = ['name', 'rate'];

    protected static function boot()
    {
        parent::boot();
        self::observe(TaxObserver::class);
    }
}
