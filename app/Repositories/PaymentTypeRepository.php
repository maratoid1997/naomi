<?php


namespace App\Repositories;


use App\Repositories\Contractors\PaymentTypeRepositoryInterface;
use App\Models\Orders\PaymentType;


class PaymentTypeRepository extends BaseRepository implements PaymentTypeRepositoryInterface
{
    public function __construct(PaymentType $model)
    {
        parent::__construct($model);
    }

    public function findIdByTypeKey($typeKey){
        return $this->model->where('type_key', $typeKey)->first()->id;
    }
}
