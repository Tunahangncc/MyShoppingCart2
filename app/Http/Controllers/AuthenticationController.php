<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerLoginRequest;

class AuthenticationController extends Controller
{
    public function customerLoginPost(CustomerLoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'type' => 'customer']))
        {
            if(session('selected_product'))
            {
                return redirect(session('selected_product'));
            }
            else
            {
                return redirect()->route('customerHome');
            }
        }
        else
        {
            return redirect()->route('customerLogin')->with(['error-message' => 'User not found, wrong email or password !']);
        }
    }

    public function signOut(Request $request)
    {
        $userType = Auth::user()->type;

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if($userType == 'customer')
        {
            return redirect()->route('customerHome');
        }
        else
        {

        }
    }
}
