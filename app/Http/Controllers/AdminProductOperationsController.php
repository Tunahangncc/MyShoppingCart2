<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductOperationsRequest;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductOperationsController extends Controller
{
    public function createProduct(AdminProductOperationsRequest $request)
    {
        //Check color
        $color = Color::query()->where('hex_code', $request->hexCode)->first();

        if($color == null)
        {
            $color = new Color;
            $color->name = Str::upper($request->colorName);
            $color->hex_code = $request->hexCode;
            $color->created_at = now();
            $color->updated_at = now();
            $color->save();
        }

        //Set Image
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $destinationPath = public_path('images/customer_images/product_images');
        $image->move($destinationPath, $imageName);

        //Create Product
        $uniqCode = Product::query()->orderBy('uniq_code', 'DESC')->first();

        Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand,
            'price' => $request->price,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            'color_id' => $color->id,
            'category_id' => $request->category,
            'slug' => Str::slug($request->name, '-'),
            'image' => $imageName,
            'uniq_code' => $uniqCode->uniq_code + 1,
            'description' => $request->description
        ]);

        return redirect()->back()->with(['success-message' => 'success1']);
    }

    public function deleteProduct($id)
    {
        Product::query()->where('id', $id)->delete();

        return redirect()->back()->with(['delete-success-message' => 'success2']);
    }

    public function updateProduct($id, Request $request)
    {
        //Check color
        $color = Color::query()->where('hex_code', $request->hexCode)->first();

        if($color == null)
        {
            $color = new Color;
            $color->name = Str::upper($request->colorName);
            $color->hex_code = $request->hexCode;
            $color->created_at = now();
            $color->updated_at = now();
            $color->save();
        }

        //Set Image
        $imageName = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path('images/customer_images/product_images');
            $image->move($destinationPath, $imageName);
        }

        $product = Product::query()->with(['user', 'color', 'category', 'brand'])->where('id', $id)->first();
        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->color_id = $color->id;
        $product->category_id = $request->category;
        $product->slug = Str::slug($request->name, '-');
        $product->image = ($imageName == '' || $imageName == null) ?$product->image : $imageName;
        $product->description = $request->description;
        $product->updated_at = now();
        $product->save();

        return redirect()->back()->with(['success-message' => 'success1']);
    }
}
