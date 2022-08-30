<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        "address",
        "phone1",
        "phone2",
        "email",
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(ContactObserver::class);
    }
}
