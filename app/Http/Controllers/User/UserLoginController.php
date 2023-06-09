<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Divisi;

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
            'active' => 'userregister',
            'divisi' => Divisi::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50|unique:users',
            'divisi_id' => 'required',
            'phone' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:50'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'divisi_id' => $request->divisi_id,
            'phone' => $request->phone,
            'email' => $request->email, 
            'password' => Hash::make($request->password)
        ]);

        return redirect('/user/login')->with('success', 'Register successfull!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/user/board')->with('login_success', 'Login successfull!');
        }
        else 
        {
            return back()->with('loginError', 'Login failed! Please check your credentials!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('logout_success', 'Logout successfull!');
    }
}
