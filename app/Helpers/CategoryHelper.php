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

function getCategories()
{
    return Category::query()->where('parent_id', '!=', null)->get();
}
