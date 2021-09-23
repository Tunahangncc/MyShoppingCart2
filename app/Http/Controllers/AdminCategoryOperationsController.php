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
            $category->parent_id = ($request->parentCategory == "mainCategory") ? null : $request->parentCategory;
            $category->created_at = now();
            $category->updated_at = now();
            $category->save();

            $categoryParents = $this->getParent($category);

            foreach ($categoryParents as $categoryParent)
            {
                $parentCategory = RelatedCategory::query()->where('category_id', $categoryParent)->first();
                $parentCategory->top_categories .= ','.$category->id;
                $parentCategory->save();
            }

            RelatedCategory::create([
                'category_id' => $category->id,
                'top_categories' => $category->id,
            ]);

            return redirect()->back()->with(['create-success-message' => 'success1']);
        }
    }

    public function editCategory($id, Request $request)
    {
        $selectedCategory = Category::query()->with(['childrenCategories'])->where('id', $id)->first();
        $mainCategory = RelatedCategory::query()->where('category_id', $selectedCategory->parent_id)->first();

        //get subcategories of selected category
        $selectedCategorySubList = [];
        $selectedCategorySubList = $this->getChildren($selectedCategory);
        array_push($selectedCategorySubList, $selectedCategory->id);

        //get subcategories of main category
        $mainCategorySubList = explode(',', $mainCategory->top_categories);
        $newSubList = [];
        for ($i=0; $i<count($mainCategorySubList); $i++)
        {
            if(!in_array($mainCategorySubList[$i], $selectedCategorySubList))
            {
                array_push($newSubList, $mainCategorySubList[$i]);
            }
        }

        //Update Old Main Category
        $topCategories = '';
        for ($i=0; $i<count($newSubList); $i++)
        {
            if($i < (count($newSubList) - 1))
            {
                $topCategories .= $newSubList[$i].',';
            }
            else
            {
                $topCategories .= $newSubList[$i];
            }
        }
        $mainCategory->top_categories = $topCategories;
        $mainCategory->save();

        //Update Main Category
        $selectedNewMainCategory = RelatedCategory::query()->with(['category'])->where('category_id', $request->parentCategory)->first();
        $selectedNewMainCategorySubList = $selectedNewMainCategory->top_categories;
        $oldCategoryID = '';
        for ($i=0; $i<count($selectedCategorySubList); $i++)
        {
            if($i < (count($selectedCategorySubList) - 1))
            {
                $oldCategoryID .= $selectedCategorySubList[$i].',';
            }
            else
            {
                $oldCategoryID .= $selectedCategorySubList[$i];
            }
        }
        $selectedNewMainCategory->top_categories = $selectedNewMainCategorySubList.','.$oldCategoryID;
        $selectedNewMainCategory->save();

        $selectedCategory->parent_id = $selectedNewMainCategory->id;
        $selectedCategory->save();

        return redirect()->back()->with(['success-message' => 'success1']);
    }
    private function getChildren($category)
    {
        $ids = [];
        foreach ($category->childrenCategories as $cat) {
            $ids[] = $cat->id;
            $ids = array_merge($ids, $this->getChildren($cat));
        }
        return $ids;
    }
    private function getParent($category)
    {
        $catsID = [];
        if($category->parent_id != null)
        {
            $catsID[] = $category->parent_id;
            $catsID = array_merge($catsID, $this->getParent($category->parentCategory));
        }
        return $catsID;
    }

    public function deleteCategory($id)
    {
        Category::query()->where('id', $id)->delete();

        return redirect()->back()->with(['success-message' => 'success2']);
    }
}
