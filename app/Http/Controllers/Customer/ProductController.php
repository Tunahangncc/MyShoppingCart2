<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct()
    {
        $inputs = \request()->all();

        $model = Product::query();

        // Not empty input
        if (! empty($inputs['title']) ||
            ! empty($inputs['subtitle']) ||
            ! empty($inputs['min_price']) ||
            ! empty($inputs['max_price']) ||
            ! empty($inputs['created_by'])) {
            $model = $this->filterData($model, $inputs);
        }

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
        //
    }

    public function putDetail(Product $product)
    {
        //
    }

    public function getDelete(Product $product)
    {
        //
    }

    private function filterData($product, $inputs)
    {
        if (! empty($inputs['title'])) {
            $product = $product->where('title', 'LIKE', '%'.$inputs['title'].'%');
        }

        if (! empty($inputs['subtitle'])) {
            $product = $product->where('subtitle', '%'.$inputs['subtitle'].'%');
        }

        if (! empty($inputs['min_price'])) {
            $product = $product->where('price', '>=', $inputs['min_price']);
        }

        if (! empty($inputs['max_price'])) {
            $product = $product->where('price', '<=', $inputs['max_price']);
        }

        if (! empty($inputs['created_by'])) {
            $product = $product->where('created_by', $inputs['created_by']);
        }

        return $product;
    }
}
