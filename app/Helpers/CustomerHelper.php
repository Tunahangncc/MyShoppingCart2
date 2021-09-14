<?php

use App\Models\Product;

function getMyProduct()
{
    return Product::query()->with(['user', 'brand', 'category', 'color'])->where('user_id', Auth::user()->id)->paginate(10);
}