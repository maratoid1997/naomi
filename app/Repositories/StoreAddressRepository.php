<?php


namespace App\Repositories;

use App\Models\Orders\StoreAddress;

class StoreAddressRepository extends BaseRepository
{
    public function __construct(StoreAddress $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->select('id','address')->get();
    }
}
