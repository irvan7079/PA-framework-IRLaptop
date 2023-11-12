<?php

use App\Http\Controllers\AuthController;
use App\Models\Laptop;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/action', [
    AuthController::class,
    'registerAction'
])->name('register.action');

Route::post('/login/action', [
    AuthController::class, 'loginAction'
    ])->name('login.action');

Route::get('/logout', [
    AuthController::class, 'logout'
    ])->name('logout');

Route::get('/auth', function () {
    return view('auth.auth');
})->name('login');

Route::middleware('auth')-> group(function () {
    Route::get('/admin/adminmenu', function () {
        return view('admin.adminmenu');
    })->name('adminmenu');

    Route::get('/user/usermenu', function () {
        return view('user.usermenu');
    })->name('usermenu');

    Route::get('/admin/laptop', function () {
        return view('admin.laptop', [
        "laptop" => Laptop::all()
        ]);
        })->name('admin.laptop');
    });
