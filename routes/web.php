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
use App\Exports\RekapCCTVExport;
use Maatwebsite\Excel\Facades\Excel;


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

// Route untuk halaman utama setelah login
// aku hapus dulu karena gak bisa masuk 
Route::group(['middleware' => 'auth'], function () {

    // jika datang permintaan ke /dashboard, maka akan diarahkan ke method dashboard pada SekolahController
    // direktorinya adalah app/Http/Controllers/SekolahController.php
    Route::get('/dashboard', [sekolahController::class, 'dashboard'])->name('dashboard');
              //ini permintaan            //ini fungsi dashboard di         //alias untuk route ini
                                      //controller SekolahController

    // jika datang permintaan ke /user-management, maka akan diarahkan ke
    // view resources/views/users/menu-users.blade.php
    Route::get('user-management', function () {
        return view('users.menu-users');
    })->name('user-management'); //alias untuk route ini

    //jika datang permintaan ke /cctv-sekolah, maka akan diarahkan ke method index pada sekolahController
    // direktorinya adalah app/Http/Controllers/sekolahController.php
    Route::get('cctv-sekolah', [sekolahController::class, 'index'])->name('menu-sekolah');
                //ini permintaan            //ini fungsi index di         //alias untuk route ini
                                      //controller SekolahController

    //jika datang permintaan ke /menu-cctv-panorama, maka akan diarahkan ke method index pada PanoramaController
    // direktorinya adalah app/Http/Controllers/PanoramaController.php
    Route::get('menu-cctv-panorama', [PanoramaController::class, 'index'])->name('menu-panorama');
                                                                               //alias untuk route ini
    //ini masih dalam pengembangan
    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    // ini belum selesai
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    // ini belum selesai
    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');

    // ini belum selesai
    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    // ini belum selesai
    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    // ini belum selesai
    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');

    // ini belum selesai
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

    Route::get('/export-rekap-cctv', function () {
    return Excel::download(new RekapCCTVExport, 'rekap_cctv.xlsx');
    })->name('export.rekap.cctv');

    //Route::get('/export-rekap-cctv', [ExportController::class, 'form'])->name('export.rekap.cctv');
    //Route::post('/export-rekap-cctv', [ExportController::class, 'export'])->name('export.rekap.cctv.post');

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
Route::get('/', [SekolahController::class, 'cctvsekolah'])->name('sekolah.sekolah'); //aman halaman dashboard utama atau '/'
Route::get('/index', [SekolahController::class, 'index'])->name('sekolah.index'); //ini sama dengan /cctv-sekolah
Route::get('/create', [SekolahController::class, 'create'])->name('sekolah.create'); //aman buat nambah cctv sekolah
Route::post('/sekolah', [SekolahController::class, 'store'])->name('sekolah.store'); //aman aja
Route::get('editSekolah/{sekolah}', [SekolahController::class, 'edit'])->name('sekolah.edit');
Route::post('/sekolah/{sekolah}', [SekolahController::class, 'update'])->name('sekolah.update');
Route::delete('/sekolah/{sekolah}', [SekolahController::class, 'delete'])->name('sekolah.delete');
Route::get('/sekolah/check-duplicate', [SekolahController::class, 'checkDuplicate'])->name('sekolah.checkDuplicate'); //aman
Route::get('/sekolah/getWilayah', [SekolahController::class, 'getWilayah'])->name('sekolah.getWilayah'); //aman
Route::get('/sekolah/search', [SekolahController::class, 'search'])->name('sekolah.search'); //sedang proses

//Route Panorama
Route::get('/cctvpanorama', [PanoramaController::class, 'dashboard'])->name('panorama.panorama'); //aman, buat halaman /cctvpanorama
Route::get('/index2', [PanoramaController::class, 'index'])->name('panorama.index'); // sama kayak /menu-cctv-panorama
Route::post('/store-panorama', [PanoramaController::class, 'store'])->name('panorama.store');
Route::post('/panorama/{id}', [PanoramaController::class, 'update'])->name('panorama.update');
Route::delete('/panorama/{id}', [PanoramaController::class, 'delete'])->name('panorama.delete');

// Route untuk registrasi dan login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('view-login'); //aman, ini buat /login
    Route::post('/session', [SessionsController::class, 'store'])->name('login'); //aman, ini buat kalo sudah berhasil login, maka redirect ke /dashboard
    Route::get('/login/forgot-password', [ResetController::class, 'create']); //aman, yg penting logout dulu, baru masuk ke /login/forgot-password
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']); //aman, ini buat ngirim email reset password
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset'); //aman, ini halaman buat ganti password, tambahkan /reset-password/1 atau apapun
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update'); //aman, ini buat reset password, kalo berhasil akan redirect ke /login
});

// Route::get(...)	Menampilkan halaman / mengambil data
// Route::post(...)	Mengirim data ke server (form, input, simpan, dst)
// middleware => 'auth'	Hanya bisa diakses jika user sudah login
// middleware => 'guest'	Hanya bisa diakses jika user belum login


/* buat yang lupa password lokal

gunakan php artisan tinker di terminal, lalu setelah terbuka shellnya, ketikkan:
echo Hash::make('admin123');

    - "admin123" adalah password yang ingin di-hash

Kemudian copy hasilnya, lalu ganti di phpmyadmin, di tabel users, 
pada kolom password untuk user dengan email

Route::get('/cek', function () {
    $plain = 'admin123';
    $hash = '$2y$10$QnYgFpiCpgSOoCko270cqO/y1X0V4SudTCitwHrA1hdStKGZ.yoD2';
    return Hash::check($plain, $hash) ? 'Cocok' : 'Tidak cocok';
});

*/