<?php

namespace App\Http\Resources\V1\Orders;

use App\Models\Orders\PaymentStatus;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderHistory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => Carbon::make($this->created_at)->toDateString(),
            'paymentType' => $this->paymentType->name,
            'paymentStatus' => $this->paymentStatus ? $this->paymentStatus->name : null,
            'orderStatus' =>  $this->status ? $this->status->name : null,
            'rejected' => $this->paymentStatus && $this->paymentStatus->type == PaymentStatus::STATUS_REFUND,
            'price' => $this->total
        ];
    }
}
