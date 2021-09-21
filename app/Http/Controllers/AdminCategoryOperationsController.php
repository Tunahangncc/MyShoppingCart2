<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RelatedCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryOperationsController extends Controller
{
    public function createCategory(Request $request)
    {
        if($request->name == null)
        {
            return redirect()->back()->with(['create-error-message' => 'error1']);
        }
        else
        {
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->parent_id = ($request->parentCategory == "mainCategory") ? null : $request->mainCategory;
            $category->created_at = now();
            $category->updated_at = now();
            $category->save();

            RelatedCategory::create([
                'category_id' => $category->id,
                'top_categories' => $category->id,
            ]);

            return redirect()->back()->with(['create-success-message' => 'success1']);
        }
    }

    public function editCategory($id)
    {
        $categoryInformation = Category::query()->with(['childrenCategories', 'parentCategory'])->where('id', $id)->first();
        $subCategories = explode(',', RelatedCategory::query()->where('category_id', $id)->first());

        $parentCategory = RelatedCategory::query()->where('category_id', $categoryInformation->parentCategory->id)->first();
        $list = explode(',', $parentCategory->top_categories);
        $newList = [];

        //Ana kategoriden alt kategorileri silme
        foreach ($subCategories as $category)
        {
            foreach ($list as $item)
            {
                if($category != $item && !in_array($item, $newList))
                {
                    array_push($newList, $item);
                }
            }
        }

        dd($newList);
    }
}
