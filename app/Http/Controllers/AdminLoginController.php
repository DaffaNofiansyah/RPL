<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('adminlogin.login',
        [
            'title' => 'Admin Login',
            'active' => 'adminlogin'
        ]);
    }

    
}
