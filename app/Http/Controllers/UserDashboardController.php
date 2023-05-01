<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('userdashboard.index',
        [
            'title' => 'User Dashboard',
            'active' => 'userdashboard'
        ]);
    }
}
