<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaptopController;
use App\Models\Laptop;
use App\Models\User;
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
    return view('welcome', [
        "laptop" => Laptop::all()
    ]);
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

Route::middleware(['auth', 'ceklevel:admin'])-> group(function () {
    Route::get('/admin/adminmenu', function () {
        return view('admin.adminmenu', [
        "laptop" => Laptop::all()
        ]);
    })->name('adminmenu');

    Route::get('/admin/laptop', function () {
        return view('admin.laptop', [
        "laptop" => Laptop::all()
        ]);
        })->name('admin.laptop');

    Route::get('/admin/akun', function () {
        return view('admin.akun', [
        "user" => User::all()
        ]);
        })->name('admin.akun');

    Route::get('/admin/riwayat', function () {
        return view('admin.riwayat', [
        "user" => User::all()
        ]);
        })->name('admin.riwayat');

    Route::get('/admin/addlaptop', function () {
        return view('admin.addlaptop');
    })->name('admin.addlaptop');

    Route::controller(LaptopController::class)->group(function () {
        Route::post('/admin/laptop/add/action', 'add')->name('admin.add');
        Route::get('/admin/laptop/edit/{id}', 'edit')->name('admin.edit');
        Route::post('/admin/laptop/edit/{id}/action','update')->name('admin.update');
        Route::post('/admin/laptop/delete/{id}/action', 'delete')->name('admin.delete');
        Route::post('/admin/akun/delete/{id}/action', 'deleteakun')->name('admin.deleteakun');
        Route::get('/admin/laptop/searchlaptop', 'searchlaptop')->name('admin.searchlaptop');
        Route::get('/admin/laptop/searchakun', 'searchakun')->name('admin.searchakun');
        Route::get('/admin/laptop/searchriwayat', 'searchriwayat')->name('admin.searchriwayat');
    });
});

Route::middleware('auth')-> group(function () {
    Route::get('/user/usermenu', function () {
        return view('user.usermenu', [
            "laptop" => Laptop::all()
            ]);
    })->name('user.usermenu');

    Route::get('/user/pembelian', function () {
        return view('user.pembelian', [
            "laptop" => Laptop::all()
            ]);
    })->name('user.pembelian');

    Route::controller(LaptopController::class)->group(function () {
        Route::get('/user/usermenu/filteruser', 'filteruser')->name('user.filteruser');
        Route::get('/user/pembelian/{id}', 'pembelian')->name('user.pembelian');
        Route::post('/user/pembelian/konfirmasi/{id}','konfirmasi')->name('user.konfirmasi');
        Route::post('/user/pembelian/konfirmasi/{id}/action','beli')->name('user.beli');
    });
});

Route::controller(LaptopController::class)->group(function () {
    Route::get('/filterwelcome', 'filterwelcome')->name('filterwelcome');
});
