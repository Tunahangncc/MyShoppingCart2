<?php


use App\Models\Category;
use App\Models\RelatedCategory;

function getAllCategories()
{
    return RelatedCategory::query()->with(['category'])->select('*')->get();
}

function getMainCategories()
{
    return RelatedCategory::query()->with(['category'])->where('top_categories', '=', 0)->get();
}

function getSubCategories()
{
    return RelatedCategory::query()->with(['category'])->where('top_categories', '!=', 0)->get();
}

function getChildCategories($category, $topCategories)
{
    $topCategoryArray = explode(',', $topCategories);

    return Category::query()->where('id', '=', $topCategoryArray[count($topCategoryArray) - 1]);
}
