<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AdminInformations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminProfileSettingsController extends Controller
{
    public function updateProfile(Request $request)
    {
        $updateProfile = false;

        if($request->email != Auth::user()->email)
        {
            $checkEmail = User::query()->where('email', $request->email)->first();
            if($checkEmail != null)
            {
                 return redirect()->back()->with(['error-message' => 'error1']);
            }
        }

        if($request->oldPassword != null && $request->newPassword != null)
        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->oldPassword]))
            {
                $updateProfile = true;
            }
            else
            {
                return redirect()->back()->with(['error-message' => 'error2']);
            }
        }
        else{ $updateProfile = true; }

        if($updateProfile == true)
        {
            $user = User::query()->where('id', Auth::user()->id)->first();
            $information = AdminInformations::query()->where('user_id', Auth::user()->id)->first();
            $address = Address::query()->where('user_id', Auth::user()->id)->first();
            $userName = $request->firstName . ' '. $request->lastName;

            //Update User
            $user->name = $userName;
            $user->email = $request->email;
            $user->password = ($request->newPassword == null) ? Auth::user()->password : bcrypt($request->newPassword);
            $user->gender = $request->gender;
            $user->date_of_birth = $request->day.'/'.$request->month.'/'.$request->year;
            $user->slug = Str::slug($userName, '-');
            $user->save();

            //Update Information
            $information->type = $request->type;
            $information->about = $request->aboutMe;
            $information->save();

            //Update Address
            $address->neighbourhood = $request->neighbourhood;
            $address->district = $request->district;
            $address->save();

            return redirect()->back()->with(['success-message' => 'success1']);
        }
    }
}
