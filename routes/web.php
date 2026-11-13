
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Route untuk menampilkan halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route GET untuk menampilkan halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

// Route POST untuk memproses data login
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

// Route sementara untuk menguji login Manajer
Route::get('/manajer/dashboard', function () {

    // Memastikan pengguna yang masuk memiliki role manajer
    abort_unless(Auth::user()?->role === 'manajer', 403);

    // Menampilkan pesan pengujian login Manajer
    return 'Login Manajer berhasil!';

})->middleware('auth');

// Route sementara untuk menguji login Kasir
Route::get('/kasir/dashboard', function () {

    // Memastikan pengguna yang masuk memiliki role kasir
    abort_unless(Auth::user()?->role === 'kasir', 403);

    // Menampilkan pesan pengujian login Kasir
    return 'Login Kasir berhasil!';

})->middleware('auth');
