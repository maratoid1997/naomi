<?php


namespace App\Repositories;

use App\Models\Orders\Order;
use App\Repositories\Contractors\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function getHistory($customerId){
        return $this->model
            ->with(['paymentType', 'status','paymentStatus'])
            ->where('customer_id', $customerId)
            ->latest()
            ->paginate(20);
    }

    public function getHistoryItems($orderId){
        return $this->model
                ->select(
                    'orders.id as id',
                    'orders.total as total',
                    'orders.created_at as created_at',
                    'coupon_id',
                    'status_id',
                    'gift_certificate_id',
                    'payment_type_id',
                    'payment_status_id',
                )
                ->where('orders.id',$orderId)
                ->with([
                    'paymentType',
                    'status',
                    'coupon',
                    'giftCertificate',
                    'paymentStatus',
                    'items' => function($q){
                        $q->with('product');
                    },
                ])
                ->leftJoin('coupons', 'coupons.id','=','orders.coupon_id')
                ->leftJoin('gift_certificates as gc', 'gc.id','=','orders.gift_certificate_id')
                ->first();
    }

    public function updatePaymentStatus($orderId, $statusId)
    {
        return $this->model->where('id', $orderId)->update(['payment_status_id' => $statusId]);
    }
}
