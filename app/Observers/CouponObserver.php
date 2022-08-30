<?php

namespace App\Observers;

use App\Models\Orders\Coupon;
use Illuminate\Support\Str;

class CouponObserver
{
    /**
     * Handle the Coupon "created" event.
     *
     * @param  \App\Models\Orders\Coupon  $coupon
     * @return void
     */
    public function created(Coupon $coupon)
    {
        //
    }

    public function creating(Coupon $coupon){
        $coupon->code = $coupon->code ?? Str::random(6);
    }

    /**
     * Handle the Coupon "updated" event.
     *
     * @param  \App\Models\Orders\Coupon  $coupon
     * @return void
     */
    public function updated(Coupon $coupon)
    {
        //
    }

    /**
     * Handle the Coupon "deleted" event.
     *
     * @param  \App\Models\Orders\Coupon  $coupon
     * @return void
     */
    public function deleted(Coupon $coupon)
    {
        //
    }

    /**
     * Handle the Coupon "restored" event.
     *
     * @param  \App\Models\Orders\Coupon  $coupon
     * @return void
     */
    public function restored(Coupon $coupon)
    {
        //
    }

    /**
     * Handle the Coupon "force deleted" event.
     *
     * @param  \App\Models\Orders\Coupon  $coupon
     * @return void
     */
    public function forceDeleted(Coupon $coupon)
    {
        //
    }
}
