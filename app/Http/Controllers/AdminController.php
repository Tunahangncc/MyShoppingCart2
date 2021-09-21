<?php

namespace App\Http\Controllers;

use App\Models\AdminInformations;
use App\Models\Product;
use App\Models\ShoppingHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showAdminProfilePage($id)
    {
        $admin = User::query()->with(['address'])->where('id', $id)->first();

        return view('admins.admin_profile', [
            'admin' => $admin,
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
        $adminInformation = AdminInformations::query()->with(['user', 'user.address'])->where('user_id', Auth::user()->id)->first();
        $months = array(
            'Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April',
            'May' => 'May', 'June' => 'June', 'July' => 'July', 'Aug' => 'August',
            'Sep' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'
        );

        return view('admins.profile_settings', [
            'adminInformation' => $adminInformation,
            'months' => $months,
        ]);
    }

    public function showWebsiteUsersPage()
    {
        $admins = User::query()->with(['adminInformation'])->where('type', 'admin')->paginate(5);
        $users = User::query()->where('type', 'customer')->paginate(5);

        return view('admins.website_users', [
            'users' => $users,
            'admins' => $admins,
        ]);
    }

    public function showProductOperationsPage()
    {
        \Session::put('page', \request()->fullUrl());
        $products = Product::query()->with(['user', 'color', 'brand', 'category'])->orderBy('created_at', 'DESC')->paginate(7);
        return view('admins.product_operations', [
            'brands' => getBrands(),
            'categories' => getCategories(),
            'products' => $products,
        ]);
    }

    public function showSelectedProductEditPage($id)
    {
        $product = Product::query()->with(['user', 'color', 'category', 'brand'])->where('id', $id)->firstOrFail();
        return view('admins.product_operations_edit', [
            'product' => $product,
            'brands' => getBrands(),
            'categories' => getCategories(),
        ]);
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

    public function returnProductOperations()
    {
        return redirect(session('page'));
    }
}
