<?php

namespace App\Http\Resources\V1\Orders;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoryItem extends JsonResource
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
            'product_id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'sku' => $this->sku,
            'quantity' => $this->quantity,
            'promo_action' => $this->promo_action,
            'gift_certificate' => $this->gift_certificate,
            'image' => $this->getFirstMediaUrl('productMainImage')
        ];
    }
}
