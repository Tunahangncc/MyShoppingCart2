<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getList()
    {
        $inputs = \request()->all();

        $model = Product::query()->with([
            'cloudFile',
            'colors',
        ]);

        $createdIds = $model->get()->pluck('created_by')->toArray();
        $users = User::query()->whereIn('id', $createdIds)->pluck('name', 'id')->toArray();

        $products = $model->paginate(10);

        return view('customer.pages.product.list', compact(
            'products',
            'users'
        ));
    }

    public function getCreate()
    {
        //
    }

    public function postCreate()
    {
        //
    }

    public function getDetail(Product $product)
    {
        $productCloudFile = $product->cloudFile;

        return view('customer.pages.product.detail', compact(
            'product',
            'productCloudFile'
        ));
    }

    public function putDetail(Product $product)
    {
        //
    }

    public function getDelete(Product $product)
    {
        //
    }

    public function getSearchProduct()
    {
        $inputs = \request()->all();
        $products = [];

        // empty input
        if (empty($inputs['title'])) {
            return response()->json([
                'status' => false,
                'messages' => [
                    'Search field required !'
                ],
                'data' => ['products' => $products]
            ]);
        }

        $products = Product::query()->where('title', 'LIKE', $inputs['title'].'%')->get();

        return response()->json([
            'status' => true,
            'data' => [
                'products' => $products
            ]
        ]);
    }
}
