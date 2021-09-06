<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductDetails()
    {
        return view('customers.product_details');
    }
}
