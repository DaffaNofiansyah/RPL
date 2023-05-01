<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserBoardController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get('/', function () {
    return view('home.index');
});

//home
Route::get('/home', function () {
    return view('home.index');
});


//USER
//userlogin
Route::get('/userlogin', [UserLoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/userlogin', [UserLoginController::class, 'authenticate']);
//userlogout
Route::post('/userlogout', [UserLoginController::class, 'logout'])->middleware('auth');
//userregister
Route::get('/userregister', [UserLoginController::class, 'register'])->middleware('guest');
//userreq
Route::resource('/user/req', UserController::class)->middleware('auth');
//userdashboard
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->middleware('auth');

//adminlogin
Route::get('/adminlogin', [AdminLoginController::class, 'login'])->middleware('guest');

Route::resource('/user/board', UserBoardController::class);




