<?php


namespace App\Repositories;

use App\Repositories\Contractors\PaymentRepositoryInterface;
use App\Models\Orders\Payment;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    public function __construct(Payment $model)
    {
        parent::__construct($model);
    }

    public function findByOrderId($order_id){
        return $this->model->where('order_id', $order_id)->first();
    }
}
