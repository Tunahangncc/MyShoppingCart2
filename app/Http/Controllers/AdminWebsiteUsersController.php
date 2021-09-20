<?php

namespace App\Http\Controllers;

use App\Models\BanMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWebsiteUsersController extends Controller
{
    public function deleteAdmin($id)
    {
        if($id == Auth::user()->id)
        {
            return redirect()->back()->with(['error-message' => 'delete admin operation message.error1']);
        }
        else
        {
            $admin = User::query()->with(['adminInformation'])->where('id', $id)->first();

            if($admin->adminInformation->type == "super-admin")
            {
                return redirect()->back()->with(['error-message' => 'delete admin operation message.error2']);
            }
            else
            {
                $permissions = explode('/', Auth::user()->adminInformation->permissions);

                if (in_array('delete', $permissions))
                {
                    User::query()->where('id', $id)->delete();
                    return redirect()->back()->with(['success-message' => 'delete admin operation message.success1']);
                }
                else
                {
                    return redirect()->back()->with(['error-message' => 'delete admin operation message.error3']);
                }
            }
        }
    }

    public function deleteUser($id)
    {
        $permissions = explode('/', Auth::user()->adminInformation->permissions);

        if(in_array('ban', $permissions))
        {
            BanMessage::create([
                'user_id' => $id,
                'message_title' => 'See you again',
                'message_body' => 'We found you inappropriate for our site and blocked your account. We wish you a nice day',
            ]);

            User::query()->where('id', $id)->update(['status' => 'ban']);
            return redirect()->back()->with(['delete-user-success-message' => 'delete user operation message.success1']);
        }
        else
        {
            return redirect()->back()->with(['delete-user-error-message' => 'delete user operation message.error1']);
        }
    }
}
