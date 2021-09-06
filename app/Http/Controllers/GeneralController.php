<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function redirectHome(): RedirectResponse
    {
        return redirect()->route('customerHome');
    }
}
