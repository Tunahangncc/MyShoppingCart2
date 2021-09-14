<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerSendMessage;
use App\Models\CustomerContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function sendMessage(CustomerSendMessage $request)
    {
        CustomerContact::create([
            'user_id' => Auth::user()->id,
            'message_name' => $request->messageName,
            'message_body' => $request->messageBody,
            'message_type' => $request->messageType,
        ]);

        return redirect()->back()->with(['success-message' => 'success1']);
    }
}
