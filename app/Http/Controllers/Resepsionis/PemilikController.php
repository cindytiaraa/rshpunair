<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function create()
    {
        // tampilkan form pemilik
        return view('resepsionis.form_pemilik');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'telepon' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        // 1. buat user untuk login pemilik
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password, // sesuai permintaan kamu: TANPA HASH
        ]);

        // 2. buat data pemilik
        Pemilik::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'iduser' => $user->iduser,
        ]);

        return redirect()
            ->route('resepsionis.dashboard_resepsionis')
            ->with('success', 'Pemilik berhasil ditambahkan!');
    }
}