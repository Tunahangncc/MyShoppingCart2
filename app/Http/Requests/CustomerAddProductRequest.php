<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'productName' => 'required',
            'productBrand' => 'required',
            'productPrice' => 'required',
            'productAmount' => 'required',
            'productColorHex' => 'required',
            'productColorName' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required',
        ];
    }
}
