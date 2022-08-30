<?php


namespace App\Repositories;


use App\Repositories\Contractors\CityRepositoryInterface;
use App\Models\Customers\City;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->select('id','name')->get();
    }
}
