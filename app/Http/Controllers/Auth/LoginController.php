<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // sesuaikan view login kamu
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        if ($request->password !== $user->password) {
            return back()->with('error', 'Password salah');
        }

        // login manual
        Auth::login($user);

        // simpan role ke session (buat middleware)
        session([
            'user_role' => $user->roleUser->first()->idrole ?? null
        ]);

        // redirect berdasarkan role
        return $this->redirectByRole($user);
    }

    public function redirectByRole($user)
    {
        $role = $user->roleUser->first()->role->nama_role ?? '';

        switch ($role) {
            case 'Administrator':
                return redirect()->route('admin.dashboard_admin');
            case 'Dokter':
                return redirect()->route('dokter.dashboard_dokter');
            case 'Perawat':
                return redirect()->route('perawat.dashboard_perawat');
            case 'Resepsionis':
                return redirect()->route('resepsionis.dashboard_resepsionis');
            case 'Pemilik':
                return redirect()->route('pemilik.dashboard_pemilik');
            default:
                return redirect('/dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}