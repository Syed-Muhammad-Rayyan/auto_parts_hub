<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ensure admin is logged in
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard'); // We'll create this blade next
    }
}
