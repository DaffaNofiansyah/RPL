<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.userdashboard.index',
        [
            'title' => 'User Dashboard',
            'active' => 'userdashboard'
        ]);
    }
}
