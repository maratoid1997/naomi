<?php

namespace App\Http\Requests\V1\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'details' => 'required',
            'details.fullname' => 'required|string',
            'details.email' => 'required|email',
            'details.phone' => 'required|string',
            'details.shippingAddress' => 'required|string',
            'details.deliveryType' => 'required',
            'details.storeAddressId' => 'nullable|numeric',
            'details.paymentType' => 'required|string',
            'details.couponId' => 'nullable|numeric',
            'details.giftCertificateId' => 'nullable|numeric',
            'details.subtotal' => 'required|numeric',
            'details.total' => 'required|numeric',
            'products' => 'required|array',
            'products.*.id' => 'required|numeric',
            'products.*.price' => 'required|numeric',
            'products.*.count' => 'required|numeric',
            'currencyId' => 'required|numeric'
        ];
    }
}
