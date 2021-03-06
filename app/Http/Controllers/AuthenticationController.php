<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Str;

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
            return redirect()->route('adminDashboard');
        }
    }

    public function customerRegisterPost(CustomerRegisterRequest $request)
    {
        if ($request->password != $request->confirmPassword)
        {
            return redirect()->back()->with(['error-message' => 'error1']);
        }
        else
        {
            $checkUser = User::query()->where('email', $request->email)->first();
            if ($checkUser == null)
            {
                $fullName = $request->firstName . ' ' . $request->lastName;
                $user = new User;
                $user->name = $fullName;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->gender = $request->gender;
                $user->slug = Str::slug($fullName, '-');
                $user->images = ($request->gender == 'male') ? 'male_user_image.png' : 'female_user_image.png';
                $user->created_at = now();
                $user->updated_at = now();
                $user->save();

                Address::create([
                    'user_id' => $user->id,
                    'neighbourhood' => '---',
                    'district' => '---',
                ]);

                return redirect()->back()->with(['success-message' => 'success1']);
            }
            else
            {
                return redirect()->back()->with(['error-message' => 'error2']);
            }
        }
    }

    public function adminLoginPost(AdminLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 'admin']))
        {
            return redirect()->route('adminDashboard');
        }
        else
        {
            return redirect()->route('adminLogin')->with(['error-message' => 'error']);
        }
    }
}
