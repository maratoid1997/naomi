<?php


namespace App\Repositories;

use App\Models\Currency;


class CurrencyRepository extends BaseRepository
{
    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    public function updateRate($code, $rate){
        return $this->model->where('code', $code)->update(['rate' => $rate]);
    }

    public function all(){
        return $this->model->select('id','code as name','rate')->where('active', 1)->get();
    }
}
