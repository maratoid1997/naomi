<?php

namespace App\Http\Requests\V1\Products;

use Illuminate\Foundation\Http\FormRequest;

class Filter extends FormRequest
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
            'category' => 'nullable|string',
            'brands' => 'nullable|array',
            'colors' => 'nullable|array',
            'filters' => 'nullable|array',
            'priceFrom' => 'nullable|string',
            'priceTo' => 'nullable|string',
            'refresh' => 'boolean',
        ];
    }
}
