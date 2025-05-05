<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PanoramaController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\cctvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('user-management', function () {
        return view('users.menu-users');
    })->name('user-management');

    Route::get('cctv-sekolah', [SekolahController::class, 'index'])->name('menu-sekolah');

    Route::get('menu-panorama', function () {
        return view('menu-panorama');
    })->name('menu-panorama');

    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');

    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');

    Route::get('static-sign-up', function () {
        return view('static-sign-up');
    })->name('sign-up');

    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');
    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');

    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');
});

Route::get('/diy', [HomeController::class, 'home'])->name('welcome');

// Route CCTV
Route::get('/cctv', [cctvController::class, 'index'])->name('cctv.index');
Route::get('/cctv/create', [cctvController::class, 'create'])->name('cctv.create');
Route::post('/cctv', [cctvController::class, 'store'])->name('cctv.store');
Route::get('/cctv/{cctv}', [cctvController::class, 'show'])->name('cctv.show');
Route::get('editCctv/{cctv}', [cctvController::class, 'edit'])->name('cctv.edit');
Route::post('/cctv/{cctv}', [cctvController::class, 'update'])->name('cctv.update');
Route::delete('/cctv/{cctv}', [cctvController::class, 'delete'])->name('cctv.delete');

// Route sekolah
Route::get('/', [SekolahController::class, 'dashboard'])->name('sekolah.sekolah');
Route::get('/index',  [SekolahController::class, 'index'])->name('sekolah.index');
Route::get('/create', [SekolahController::class, 'create'])->name('sekolah.create');
Route::post('/sekolah', [SekolahController::class, 'store'])->name('sekolah.store');
Route::get('editSekolah/{sekolah}', [SekolahController::class, 'edit'])->name('sekolah.edit');
Route::post('/sekolah/{sekolah}', [SekolahController::class, 'update'])->name('sekolah.update');
Route::delete('/sekolah/{sekolah}', [SekolahController::class, 'delete'])->name('sekolah.delete');
Route::get('/sekolah/check-duplicate', [SekolahController::class, 'checkDuplicate'])->name('sekolah.checkDuplicate');
Route::get('/sekolah/getWilayah', [SekolahController::class, 'getWilayah'])->name('sekolah.getWilayah');
Route::get('/sekolah/search', [SekolahController::class, 'search'])->name('sekolah.search');


//Route Panorama
Route::get('/cctv-panorama', [PanoramaController::class, 'dashboard'])->name('sekolah.sekolah');
Route::get('/index2', [PanoramaController::class, 'index'])->name('panorama.index');
Route::post('/store-panorama', [PanoramaController::class, 'store'])->name('panorama.store');
Route::post('/panorama/{id}', [PanoramaController::class, 'update'])->name('panorama.update');
Route::delete('/panorama/{id}', [PanoramaController::class, 'delete'])->name('panorama.delete');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('view-login');
    Route::post('/session', [SessionsController::class, 'store'])->name('login');
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

