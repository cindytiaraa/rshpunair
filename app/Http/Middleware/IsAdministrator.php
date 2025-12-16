<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next):Response
    {
        if (!session()->has('user_role')) {
            return redirect()->route('login');
        }

        if (session('user_role') != 1) {
            abort(403, 'Akses Admin Ditolak');
        }

        return $next($request);
    }
}
