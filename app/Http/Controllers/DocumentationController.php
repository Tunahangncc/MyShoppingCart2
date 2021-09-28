<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function showHomePage()
    {
        return view('documentation.layouts.general');
    }
}
