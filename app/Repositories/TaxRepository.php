<?php


namespace App\Repositories;

use App\Models\Settings\Tax;


class TaxRepository extends BaseRepository
{
    public function __construct(Tax $model)
    {
        parent::__construct($model);
    }

    public function findByName($name){
        return $this->model->where('name', $name)->first();
    }

    public function all()
    {
        return $this->model->select('id','name','rate')->get();
    }
}
