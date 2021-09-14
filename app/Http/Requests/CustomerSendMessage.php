<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerSendMessage extends FormRequest
{
    public function rules()
    {
        return [
            'messageName' => 'required',
            'messageType' => 'required',
            'messageBody' => 'required',
        ];
    }
}
