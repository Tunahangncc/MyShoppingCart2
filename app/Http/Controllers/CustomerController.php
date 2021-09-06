<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showHomePage()
    {
        return view('customers.home');
    }

    public function showProductsPage()
    {
        return view('customers.products');
    }

    public function showAboutUsPage()
    {
        return view('customers.about_us');
    }

    public function showContactPage()
    {
        return view('customers.contact');
    }

    public function showLoginPage()
    {
        return view('customers.login');
    }

    public function showRegisterPage()
    {
        return view('customers.register');
    }

    public function showProfilePage()
    {
        return view('customers.profile');
    }
}
