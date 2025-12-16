<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPerawat
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_role')) {
            return redirect()->route('login');
        }

        if (session('user_role') != 3) {
            abort(403, 'Akses Perawat Ditolak');
        }

        return $next($request);
    }
}