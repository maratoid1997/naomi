<?php


namespace App\Repositories;

use App\Models\Orders\DeliveryType;

class DeliveryTypeRepository extends BaseRepository
{
    public function __construct(DeliveryType $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model
            ->selectRaw('
                id,
                JSON_UNQUOTE(JSON_EXTRACT(name, "$.'.app()->getLocale().'")) as title,
                rate,
                type
            ')
            ->get();
    }
}
