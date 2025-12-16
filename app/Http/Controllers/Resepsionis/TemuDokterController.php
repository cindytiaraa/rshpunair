<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemuDokterController extends Controller
{
    public function create()
    {
        // Ambil semua pemilik
        $pemilik = Pemilik::all();

        // Ambil semua dokter (role = 2 contoh, tapi sesuaikan role dokter kamu)
        $dokter = RoleUser::with('user')
                    ->where('idrole', 2) // ROLE DOKTER = 2?
                    ->get();

        return view('resepsionis.form_antrian', compact('pemilik', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required',
            'idrole_user' => 'required',
        ]);

        // Nomor antrian otomatis
        $no_urut = TemuDokter::max('no_urut') + 1;

        TemuDokter::create([
            'no_urut' => $no_urut,
            'waktu_daftar' => Carbon::now(),
            'status' => 'waiting',
            'idpet' => $request->idpet,
            'idrole_user' => $request->idrole_user,
        ]);

        return redirect()
            ->route('resepsionis.dashboard_resepsionis')
            ->with('success', 'Antrian baru berhasil ditambahkan!');
    }

    // AJAX: ambil hewan milik pemilik
    public function getPets($idpemilik)
    {
        return Pet::where('idpemilik', $idpemilik)->get();
    }
}