<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBoardController;


//User Controllers
use App\Http\Controllers\User\UserBoardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserLoginController;






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
})->middleware('guest')->name('login');

//home
Route::get('/home', function () {
    return view('home.index');
})->middleware('guest')->name('login');

// Route::get('/', function () {
//     return view('admin.adminprofile.index');
// })->middleware('guest')->name('login');


//USER
//userlogin


//userlogout

//userregister

//userreq

//userdashboard


//adminlogin





Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [UserLoginController::class, 'login'])->name('login');
        Route::post('/login', [UserLoginController::class, 'authenticate']);
        Route::get('/register', [UserLoginController::class, 'register']);
        Route::post('/register', [UserLoginController::class, 'store']);
    });


    Route::middleware('auth')->group(function () {
        Route::post('/logout', [UserLoginController::class, 'logout']);
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
        Route::resource('/board', UserBoardController::class);
        Route::resource('/req', UserController::class);
        // Route::get('/req/{req}/create', [UserController::class, 'create']);
        Route::get('/req/{req}/detail', [UserController::class, 'detail']);
        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/profile/{user}/updatephoto', [UserController::class, 'updatephoto']);
    });
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'login'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'authenticate']);
    });

    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'logout']);
        Route::get('/profile', [AdminController::class, 'profile']);
        Route::post('/profile/{admin}/updatephoto', [AdminController::class, 'updatephoto']);
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::resource('/board', AdminBoardController::class);
        Route::resource('/req', AdminController::class);
        Route::get('/req/{req}/take', [AdminController::class, 'take']);
        Route::get('/req/{req}/reject', [AdminController::class, 'reject']);
        Route::get('/req/{req}/complete', [AdminController::class, 'complete']);
        Route::get('/req/{req}/detail', [AdminController::class, 'detail']);
        Route::get('/board/create', [AdminBoardController::class, 'create']);
        Route::post('/board/{board}/delete', [AdminBoardController::class, 'delete']);
    });
});
