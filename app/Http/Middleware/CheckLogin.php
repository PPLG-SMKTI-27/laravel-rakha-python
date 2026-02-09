<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah ada session 'user'
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }
        
        return $next($request);
    }
}