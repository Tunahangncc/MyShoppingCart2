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
        if($request->email != Auth::user()->email)
        {
            $checkEmail = User::query()->where('email', $request->email)->first();
            if($checkEmail != null)
            {
                 return redirect()->back()->with(['error-message' => 'error1']);
            }
        }

        $userName = $request->firstName . ' '. $request->lastName;
        User::query()->where('id', Auth::user()->id)->update([
            'name' => $userName,
            'email' => $request->email,
            'slug' => Str::slug($userName, '-'),
        ]);

        AdminInformations::query()->where('user_id', Auth::user()->id)->update([
            'type' => $request->type,
            'about' => $request->aboutMe,
        ]);

        Address::query()->where('user_id', Auth::user()->id)->update([
            'neighbourhood' => $request->neighbourhood,
            'district' => $request->district,
        ]);

        return redirect()->back()->with(['success-message' => 'success1']);
    }
}
