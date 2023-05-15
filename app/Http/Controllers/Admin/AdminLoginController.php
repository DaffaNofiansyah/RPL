<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.adminlogin.login',
        [
            'title' => 'Admin Login',
            'active' => 'adminlogin'
        ]);
    }

    public function register()
    {
        return view('admin.adminlogin.register',
        [
            'title' => 'Admin Register',
            'active' => 'adminregister'
        ]);
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('success', 'Login successfull!');
        }
        return back()->with('loginError', 'Login failed! Please check your credentials!');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Logout successfull!');
    }
}
