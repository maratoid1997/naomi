<?php


namespace App\Repositories;

use App\Models\Locale;

class LocaleRepository extends BaseRepository
{
    public function __construct(Locale $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->select('id', 'code')->where('active', 1)->get();
    }
}
