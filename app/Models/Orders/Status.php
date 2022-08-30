<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Status extends Model
{
    use HasFactory, HasTranslations;

    const STATUS_NOT_FINISHED = 0;
    const STATUS_FINISHED = 1;
    const STATUS_APPROVED = 2;
    const STATUS_PREPARING = 3;
    const STATUS_READY = 4;
    const STATUS_HANDED_OVER_COURIER = 5;
    const STATUS_COURIER_HANDED_OVER = 6;
    const STATUS_HANDED_OVER = 7;
    const STATUS_RETURNED_WAREHOUSE = 8;

    const COLOR_STATUS_FINISHED = "#008000";
    const COLOR_STATUS_NOT_FINISHED = "#C70039";

    protected $table = 'order_statuses';
    protected $fillable = [
        'name',
        'color',
        'type',
    ];

    public $translatable = [
        "name"
    ];

    public function orders(){
        return $this->hasMany(Order::class, 'status_id');
    }
}
