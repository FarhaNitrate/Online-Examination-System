<?php

// app/Http/Middleware/AuthenticateTeacher.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateTeacher
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'teacher') {
            return redirect('/')->withErrors(['message' => 'Unauthorized']);
        }

        return $next($request);
    }
}

