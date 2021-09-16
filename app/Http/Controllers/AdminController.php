<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingHistory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboardPage()
    {
        $topUsers = ShoppingHistory::query()->with(['user'])->orderBy('total_expenditure', 'DESC')->take(4)->get();
        $topProducts = Product::query()->orderBy('number_of_likes', 'DESC')->take(4)->get();

        return view('admins.dashboard', [
            'topUsers' => $topUsers,
            'topProducts' => $topProducts,
        ]);
    }

    public function showCustomerProfilePage($id)
    {
        $customer = User::query()->with(['shoppingHistory', 'address'])->where('id', $id)->first();

        return view('admins.customer_profile', [
            'customer' => $customer,
        ]);
    }

    public function showSelectedProductDetailsPage($id)
    {
        $product = Product::query()->with(['color', 'user', 'brand', 'category'])->where('id', $id)->first();

        return view('admins.product_details', [
            'product' => $product,
        ]);
    }

    public function showProfileSettingsPage()
    {
        return view('admins.profile_settings');
    }

    public function showWebsiteUsersPage()
    {
        return view('admins.website_users');
    }

    public function showProductOperationsPage()
    {
        return view('admins.product_operations');
    }

    public function showSelectedProductEditPage()
    {
        return view('admins.product_operations_edit');
    }

    public function showCategoryOperationsPage()
    {
        return view('admins.category_operations');
    }

    public function showSelectedCategoryEditPage()
    {
        return view('admins.category_operations_edit');
    }

    public function showLoginPage()
    {
        return view('admins.login');
    }
}
