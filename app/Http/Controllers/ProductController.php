<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAddProductToCartRequest;
use App\Models\Product;
use App\Models\ShoppingBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showProductDetails($id)
    {
        $selectedProduct = Product::query()->with(['user', 'brand', 'color', 'category'])->where('id', $id)->first();

        return view('customers.product_details', compact('selectedProduct'));
    }

    public function addProductToCart($id, CustomerAddProductToCartRequest $request)
    {
        $product = Product::query()->where('id', $id)->first();

        if($request->productAmount == 0 && $product->amount > 0)
        {
            return redirect()->back()->with(['error-message' => 'product quantity cannot be below zero']);
        }
        else
        {
            if($product->amount > 0)
            {
                $checkShoppingBag = ShoppingBag::query()->where('user_id', Auth::user()->id)->where('product_id', $id)->first();

                if($checkShoppingBag == null)
                {
                    ShoppingBag::create([
                        'user_id' => Auth::user()->id,
                        'product_id' => $id,
                        'quantity' => $request->productAmount,
                    ]);

                    $product->amount -= $request->productAmount;
                    $product->save();

                    return redirect()->back()->with(['success-message' => 'product added to cart']);
                }
                else
                {
                    $checkShoppingBag->quantity += $request->productAmount;
                    $checkShoppingBag->save();

                    $product->amount -= $request->productAmount;
                    $product->save();

                    return redirect()->back()->with(['success-message' => 'cart updated']);
                }
            }
            else
            {
                return redirect()->back()->with(['error-message' => 'out of stock items']);
            }
        }
    }

    public function likeProduct()
    {

    }
}
