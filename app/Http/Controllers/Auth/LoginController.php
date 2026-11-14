<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Menggunakan fitur autentikasi bawaan Laravel
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman Login
     */
    public function showLoginForm()
    {
        // Menampilkan halaman login
        return view('auth.login');
    }

    /**
     * Memproses data Login yang dikirim oleh pengguna
     */
    public function login(Request $request)
    {
        // Memeriksa apakah email dan password sudah diisi dengan benar
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Memeriksa kecocokan email dan password dengan data di database
        if (!Auth::attempt($credentials)) {
            // Mengembalikan pengguna ke halaman login jika tidak cocok
            return back()->withErrors([
                'email' => 'Email atau password tidak sesuai.',
            ])->onlyInput('email');
        }

        // Mengambil data pengguna yang berhasil login
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki role kasir atau manajer
        if (!in_array($user->role, ['kasir', 'manajer'], true)) {
            // Mengeluarkan pengguna jika rolenya bukan kasir atau manajer
            Auth::logout();

            // Menghapus session lama untuk menjaga keamanan
            $request->session()->invalidate();

            // Membuat token CSRF baru
            $request->session()->regenerateToken();

            // Mengembalikan pengguna ke halaman login dengan pesan kesalahan
            return back()->withErrors([
                'email' => 'Akun ini tidak memiliki akses ke website staf.',
            ])->onlyInput('email');
        }

        // Memperbarui session ID setelah login berhasil
        $request->session()->regenerate();

        // Mengarahkan manajer ke dashboard manajer
        if ($user->role === 'manajer') {
            return redirect('/manajer/dashboard');
        }

        // Mengarahkan kasir ke dashboard kasir
        if ($user->role === 'kasir') {
            return redirect('/kasir/dashboard');
        }
    }

    /**
     * Memproses Logout pengguna
     */
    public function logout(Request $request)
    {
        // Mengeluarkan pengguna dari sistem
        Auth::logout();

        // Menghapus session lama pengguna
        $request->session()->invalidate();

        // Membuat token CSRF baru untuk keamanan
        $request->session()->regenerateToken();

        // Mengarahkan pengguna kembali ke halaman login
        return redirect('/login');
    }
}
