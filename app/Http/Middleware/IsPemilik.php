<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPemilik
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_role')) {
            return redirect()->route('login');
        }

        if (session('user_role') != 5) {
            abort(403, 'Akses Pemilik Ditolak');
        }

        return $next($request);
    }
}