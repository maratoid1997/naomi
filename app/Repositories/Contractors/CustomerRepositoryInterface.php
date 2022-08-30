<?php


namespace App\Repositories\Contractors;


interface CustomerRepositoryInterface
{
    public function getDetails($id);
    public function getCustomerByPhone($phone);
    public function createCustomerAddresses($id, $addresses);
}
