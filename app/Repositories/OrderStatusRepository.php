<?php


namespace App\Repositories;

use App\Models\Orders\Status;

class OrderStatusRepository extends BaseRepository
{
    public function __construct(Status $model)
    {
        parent::__construct($model);
    }

    public function findIdByType($type){
        return $this->model->where('type', $type)->first()->id;
    }
}
