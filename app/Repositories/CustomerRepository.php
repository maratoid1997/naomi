<?php


namespace App\Repositories;


use App\Repositories\Contractors\CustomerRepositoryInterface;
use App\Models\Customers\Customer;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    public function getDetails($id)
    {
        return $this->model->where('id', $id)->with(['user', 'addresses'])->first();
    }

    public function getCustomerByPhone($phone)
    {
        return $this->model->where('phone', $phone)->first();
    }

    public function createCustomerAddresses($id, $addresses)
    {
        $this->find($id)->addresses()->delete();
        return $this->find($id)->addresses()->insert($addresses);
    }
}
