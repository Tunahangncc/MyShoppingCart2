<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\RelatedCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class CategoryController extends Controller
{
    public function showSelectedCategory($id, Request $request){
        $categories = Category::query()->whereNull('parent_id')->with('childrenCategories')->get();

        $relatedCategory = RelatedCategory::query()->with(['category'])->where('category_id', $id)->first();

        $topCategoryArray = explode(',', $relatedCategory->top_categories);

        $productsArray = [];

        foreach ($topCategoryArray as $item) {
            $findProducts = Product::query()->with(['user', 'brand', 'color', 'category'])->where('category_id', $item)->get();

            foreach ($findProducts as $findProduct)
            {
                array_push($productsArray, $findProduct);
            }
        }

        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($productsArray);

        // Define how many items we want to be visible in each page
        $perPage = 12;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generated links
        $paginatedItems->setPath($request->url());

        return view('customers.products', [
            'products' => $paginatedItems,
            'productCount' => count($productsArray),
            'categories' => $categories,
        ]);
    }
}
