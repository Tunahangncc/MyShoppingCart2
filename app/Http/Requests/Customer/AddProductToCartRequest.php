<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddProductToCartRequest extends FormRequest
{
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }

        return false;
    }

    public function rules()
    {
        return [
            'product_id' => ['required', 'numeric'],
            'amount' => ['required', 'numeric', 'min:1']
        ];
    }
}
