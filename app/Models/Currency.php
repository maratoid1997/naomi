<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    CONST AZN = 'azn';
    CONST USD = 'usd';
    CONST RUB = 'rub';

    protected $fillable = ['code', 'rate'];
}
