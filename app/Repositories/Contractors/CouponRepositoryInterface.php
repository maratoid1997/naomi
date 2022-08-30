<?php


namespace App\Repositories\Contractors;


interface CouponRepositoryInterface
{
    public function findByCode($code);
    public function checkCouponOneTime($couponId);
}
