<?php


namespace App\Repositories;


use App\Repositories\Contractors\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

    public function getSingle(){
        return $this->model->select('id','address','phone1','phone2','email')->first();
    }
}
