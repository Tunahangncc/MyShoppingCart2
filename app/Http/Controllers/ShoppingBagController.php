<?php

namespace App\Http\Controllers;

use App\Models\ShoppingBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingBagController extends Controller
{
    public function orderNow()
    {
        $checkUser = ShoppingBag::query()->where('user_id', Auth::user()->id)->first();

        if($checkUser == null)
        {
            return redirect()->back()->with(['error-message' => 'your shopping cart is empty']);
        }
        else
        {
            ShoppingBag::query()->where('user_id', Auth::user()->id)->delete();

            return redirect()->back()->with(['success-message' => 'payment process completed successfully']);
        }
    }
}
