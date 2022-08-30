<?php


namespace App\Repositories\Contractors;


interface PaymentStatusInterface
{
    public function findIdByType($type);
}
