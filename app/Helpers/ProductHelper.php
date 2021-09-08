<?php

use App\Models\Product;

function getProductsCount(): int
{
    return Product::query()->count('*');
}

function getAllProducts()
{
    return Product::query()->with(['user', 'brand', 'color', 'category'])->select('*')->paginate(12);
}
