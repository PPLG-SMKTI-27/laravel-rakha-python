<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function process(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'admin@sekolah.id' && $password === '123456') {
            // Simpan session dengan benar
            session([
                'user' => [
                    'email' => $email,
                    'name' => 'Admin',
                    'role' => 'admin',
                    'logged_in' => true
                ]
            ]);
            
            // Redirect ke dashboard skills
            return redirect()->route('dashboard.index')
                ->with('success', 'Login successful!');
        }

        return back()->with('error', 'Email or password is wrong');
    }
}