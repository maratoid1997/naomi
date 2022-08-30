<?php


namespace App\Repositories;

use App\Models\Customers\CustomerExpiredCoupon;


class CustomerExpiredCouponRepository extends BaseRepository
{
    public function __construct(CustomerExpiredCoupon $model)
    {
        parent::__construct($model);
    }

    public function checkCustomerUsedCoupon($couponId,$customerId){
        return $this->model->where('coupon_id', $couponId)->where('customer_id',$customerId)->count();
    }
}
