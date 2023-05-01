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


//userlogout

//userregister

//userreq

//userdashboard


//adminlogin





Route::prefix('user')->name('user.')->group(function () 
{
    Route::middleware('guest')->group(function () 
    {
        Route::get('/login', [UserLoginController::class, 'login'])->name('login');
        Route::post('/login', [UserLoginController::class, 'authenticate']);
        Route::get('/register', [UserLoginController::class, 'register']);
    });


    Route::middleware('auth')->group(function () 
    {
        Route::post('/logout', [UserLoginController::class, 'logout']);
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
        Route::resource('/board', UserBoardController::class);
        Route::resource('/req', UserController::class);
        
    });
});


Route::prefix('admin')->name('admin.')->group(function () 
{
    Route::middleware('guest')->group(function () 
    {
        Route::get('/login', [AdminLoginController::class, 'login'])->name('login');
    });

    Route::middleware('auth')->group(function () 
    {

    });
});




