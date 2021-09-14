<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAddProductRequest;
use App\Models\Address;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function EditProfile(Request $request)
    {
        //Password
        if($request->newPassword != null)
        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->oldPassword]))
            {
                Auth::user()->password = bcrypt($request->newPassword);
            }
        }

        //Image
        $input['imageName'] = '';
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $input['imageName'] = $image->getClientOriginalName();
            $destinationPath = public_path('images/customer_images/profile_images');
            $image->move($destinationPath, $input['imageName']);
        }
        else
        {
            if(Auth::user()->gender == 'male') {$input['imageName'] = "male_user_image.png";}
            else{$input['imageName'] = "female_user_image.png";}
        }

        Auth::user()->email = $request->email;
        Auth::user()->name = $request->firstName.' '.$request->lastName;
        Auth::user()->gender = $request->gender;
        Auth::user()->date_of_birth = $request->year.'/'.$request->day.'/'.$request->month;
        Auth::user()->slug = Str::slug(Auth::user()->name, '-');
        Auth::user()->images = $input['imageName'];
        Auth::user()->save();

        return redirect()->back()->with(['success-message' => 'profile updated']);
    }

    public function EditAddress(Request $request)
    {
        Address::query()->where('user_id', Auth::user()->id)->update([
            'neighbourhood' => ($request->city == null) ? '---' : $request->city,
            'district' => ($request->district == null) ? '---' : $request->district
        ]);

        return redirect()->back()->with(['success-message' => 'address updated']);
    }

    public function AddProduct(CustomerAddProductRequest $request)
    {
        if($request->productBrand == 'empty')
        {
            return redirect()->back()->with(['error-message' => 'error1']);
        }
        elseif ($request->productCategory == 'empty')
        {
            return redirect()->back()->with(['error-message' => 'error2']);
        }
        else
        {
            //Set Variable
            $productName = $request->productName;
            $productBrand = $request->productBrand;
            $productCategory = $request->productCategory;
            $productPrice = $request->productPrice;
            $productAmount = $request->productAmount;
            $productColorHex = $request->productColorHex;
            $productColorName = $request->productColorName;
            $productDescription = $request->productDescription;
            $productImage = $request->file('productImage');

            //Set Session
            Session::put('product_name', $productName);
            Session::put('product_brand', $productBrand);
            Session::put('product_category', $productCategory);
            Session::put('product_price', $productPrice);
            Session::put('product_amount', $productAmount);
            Session::put('product_color_hex', $productColorHex);
            Session::put('product_color_name', $productColorName);
            Session::put('product_description', $productDescription);
            Session::put('product_image', $productImage);

            //Set image
            $imageName = '';
            if($request->hasFile('productImage'))
            {
                $image = $request->file('productImage');
                setProductImage($image);
                $imageName = getProductImageName($image);
            }

            //Check color
            $color = Color::query()->where('hex_code', $productColorHex)->first();
            if($color == null)
            {
                $color = new Color;
                $color->name = $productColorName;
                $color->hex_code = $productColorHex;
                $color->created_at = now();
                $color->updated_at = now();
                $color->save();
            }



            //Add Product
            $uniqCode = Product::query()->orderBy('uniq_code', 'DESC')->first();
            Product::create([
                'name' => $productName,
                'brand_id' => $productBrand,
                'price' => $productPrice,
                'amount' => $productAmount,
                'user_id' => Auth::user()->id,
                'color_id' => $color->id,
                'category_id' => $productCategory,
                'slug' => Str::slug($productName, '-'),
                'image' => $imageName,
                'uniq_code' => $uniqCode + 1,
                'description' => $productDescription
            ]);
        }
    }

    public function EditSelectedProduct()
    {

    }

    public function DeleteProduct()
    {

    }

    public function DeleteMessage()
    {

    }

    public function ReadMessage()
    {

    }
}
