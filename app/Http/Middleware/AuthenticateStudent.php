<?php
// app/Http/Middleware/AuthenticateStudent.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateStudent
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'student') {
            return redirect('/')->withErrors(['message' => 'Unauthorized']);
        }

        return $next($request);
    }
    
}
