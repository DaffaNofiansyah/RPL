<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('user.userlogin.login',
        [
            'title' => 'User Login',
            'active' => 'userlogin'
        ]);
    }

    public function register()
    {
        return view('user.userlogin.register',
        [
            'title' => 'User Register',
            'active' => 'userregister'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/user/dashboard')->with('success', 'Login successfull!');
        }

        return back()->with('loginError', 'Login failed! Please check your credentials!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('logout_success', 'Logout successfull!');
    }
}