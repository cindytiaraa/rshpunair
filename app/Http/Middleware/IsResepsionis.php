<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsResepsionis
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_role')) {
            return redirect()->route('login');
        }

        if (session('user_role') != 4) {
            abort(403, 'Akses Resepsionis Ditolak');
        }

        return $next($request);
    }
}