<?php

use App\Models\Product;

function getProductsCount(): int
{
    return Product::query()->count('*');
}

function getAllProducts()
{
    return Product::query()->with(['user', 'brand', 'color', 'category'])->paginate(12);
}

function productCount()
{
    return count(Product::query()->get());
    // return count(Product::query()->with(['user', 'brand', 'color', 'category'])->get()); //Old Query
}

function getPaginateProducts($count)
{
    return Product::query()->with(['user', 'brand', 'color', 'category'])->select('*')->paginate($count);
}
