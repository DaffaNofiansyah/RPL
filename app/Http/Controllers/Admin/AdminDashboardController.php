<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.admindashboard.index',
        [
            'title' => 'Admin Dashboard',
            'active' => 'admindashboard'
        ]);
    }
}
