<?php

use App\Models\Product;
use Illuminate\Http\UploadedFile;

function getProductsCount(): int
{
    return Product::query()->count('*');
}

function getAllProducts()
{
    return Product::query()->with(['user', 'brand', 'color', 'category'])->select('*')->paginate(12);
}

function productCount()
{
    return count(Product::query()->with(['user', 'brand', 'color', 'category'])->select('*')->get());
}

function setProductImage(UploadedFile $image)
{
    $imageName = $image->getClientOriginalName();
    $destinationPath = public_path('images/customer_images/product_images');
    $image->move($destinationPath, $imageName);
}

function getProductImageName(UploadedFile $image)
{
    return $image->getClientOriginalName();
}
