<?php

namespace App\Http\Requests\V1\Customers;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'fullname' => 'required|string',
            'phone' => 'required|string|unique:customers,phone',
            'address' => 'required|array',
            'city_id' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|string|in:male,female',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];
    }
}
