<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddProductToCartRequest;
use App\Models\Customer\Pivots\ProductShoppingBagPivot;
use App\Models\Customer\Product;
use App\Models\Customer\ShoppingBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingBagController extends Controller
{
    public function getCart()
    {
        $activeShoppingBag = Auth::user()->shoppingBags->where('active', 1)->first();
        $products = $activeShoppingBag->products;

        $products->load([
            'productDetail'
        ]);

        return view('customer.pages.shopping_bag.list', compact(
            'products'
        ));
    }

    /**
     * @throws \Throwable
     */
    public function postAddCart(AddProductToCartRequest $request)
    {
        $inputs = $request->validated();

        DB::beginTransaction();

        $product = Product::find($inputs['product_id']);

        // Give an error if the product is not found
        if (! $product) {
            return response()->json([
                'status' => false,
                'messages' => ['Product Not Found !'],
                'data' => [],
            ]);
        }

        $shoppingBag = Auth::user()
            ->shoppingBags
            ->where('active', '=', 1)
            ->sortBy('created_at', SORT_DESC)
            ->first();

        if (! $shoppingBag) {
            $shoppingBag = ShoppingBag::query()->create([
                'code' => Auth::user()->username.'-'.rand(0, 999999)
            ]);
        }

        ProductShoppingBagPivot::query()->updateOrCreate(
            [
                'product_id' => $product->id,
                'shopping_bag_id' => $shoppingBag->id
            ],
            [
                'product_id' => $product->id,
                'shopping_bag_id' => $shoppingBag->id,
                'amount' => $inputs['amount']
            ]
        );

        DB::commit();

        $responseMessage = 'Product Add To Cart !';
        setSessionMessage($responseMessage);

        return response()->json([
            'status' => true,
            'messages' => [$responseMessage],
            'data' => [
                'product' => $product
            ],
        ]);
    }
}
