<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        return view('login');
    }

    // Memproses login
    public function process(Request $request)
    {
        // Ambil data dari form
        $email = $request->input('email');
        $password = $request->input('password');

        // Validasi login
        if ($email === 'admin@sekolah.id' && $password === '123456') {
            session(['user' => ['email' => $email]]);
            return redirect()->route('dashboard.index')->with('success', 'Login berhasil');
        }

        // Jika login gagal, kembali dengan error
        return redirect()->back()
            ->withInput($request->only('email'))
            ->with('error', 'Email atau password salah');
    }
}
