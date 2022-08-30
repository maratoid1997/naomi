<?php


namespace App\Repositories\Contractors;


interface PaymentRepositoryInterface
{
    public function findByOrderId($order_id);
}
