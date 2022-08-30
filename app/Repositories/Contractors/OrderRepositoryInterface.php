<?php


namespace App\Repositories\Contractors;


interface OrderRepositoryInterface
{
    public function getHistory($customerId);
    public function updatePaymentStatus($orderId, $statusId);
}
