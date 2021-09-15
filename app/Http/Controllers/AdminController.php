<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboardPage()
    {
        return view('admins.dashboard');
    }

    public function showProfileSettingsPage()
    {
        return view('admins.profile_settings');
    }
}
