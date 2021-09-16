<?php

namespace App\Http\Controllers;

use App\Models\ShoppingBag;
use App\Models\ShoppingHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingBagController extends Controller
{
    public function orderNow()
    {
        $checkUserShoppingBag = ShoppingBag::query()->with(['product', 'user'])->where('user_id', Auth::user()->id)->get();
        $checkUserShoppingHistory = ShoppingHistory::query()->where('user_id', Auth::user()->id)->first();
        $totalExpenditure = 0;

        if($checkUserShoppingBag == null)
        {
            return redirect()->back()->with(['error-message' => 'your shopping cart is empty']);
        }
        else
        {
            foreach ($checkUserShoppingBag as $item)
            {
                $totalExpenditure += ($item->quantity * $item->product->price);
            }

            if($checkUserShoppingHistory == null)
            {
                ShoppingHistory::create([
                    'user_id' => Auth::user()->id,
                    'total_expenditure' => $totalExpenditure,
                ]);
            }
            else
            {
                $checkUserShoppingHistory->total_expenditure = ($checkUserShoppingHistory->total_expenditure + $totalExpenditure);
                $checkUserShoppingHistory->save();
            }

            ShoppingBag::query()->where('user_id', Auth::user()->id)->delete();

            return redirect()->back()->with(['success-message' => 'payment process completed successfully']);
        }
    }
}
