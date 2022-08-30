<?php


namespace App\Repositories;

use App\Models\Orders\Coupon;
use App\Repositories\Contractors\CouponRepositoryInterface;
use Carbon\Carbon;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface
{
    public function __construct(Coupon $model)
    {
        parent::__construct($model);
    }

    public function findByCode($code)
    {
        return $this->model
            ->select('id','code','rate')
            ->where('code', $code)
            ->where('start_date', '<', Carbon::now(),)
            ->where('end_date', '>', Carbon::now(),)
            ->first();
    }

    public function checkCouponOneTime($couponId)
    {
        return $this->model->where('one_time', 1)->exists();
    }
}
