<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductOperationsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'colorName' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }
}
