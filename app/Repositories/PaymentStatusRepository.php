<?php


namespace App\Repositories;


use App\Repositories\Contractors\PaymentStatusInterface;
use App\Models\Orders\PaymentStatus;

class PaymentStatusRepository extends BaseRepository implements PaymentStatusInterface
{
    public function __construct(PaymentStatus $model)
    {
        parent::__construct($model);
    }

    public function findIdByType($type){
        return $this->model->where('type', $type)->first()->id;
    }
}
