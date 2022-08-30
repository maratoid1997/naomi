<?php

namespace App\Http\Resources\V1\Customers;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
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
            'fullname' => $this->fullname,
            'email' => $this->user->email,
            'login_type' => $this->user->login_type,
            'phone' => $this->phone,
            'address' => Address::collection($this->addresses),
            'city_id' => $this->addresses[0]->city_id ?? 0
        ];
    }
}
