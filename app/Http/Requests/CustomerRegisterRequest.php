<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'confirmPassword' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'gender' => 'required'
        ];
    }
}
