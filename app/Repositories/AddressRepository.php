<?php


namespace App\Repositories;


use App\Repositories\Contractors\AddressRepositoryInterface;
use App\Models\Customers\Addresses\Address;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    public function __construct(Address $model)
    {
        parent::__construct($model);
    }
}
