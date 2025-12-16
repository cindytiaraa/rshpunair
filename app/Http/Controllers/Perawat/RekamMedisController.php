<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use App\Models\RekamMedis;

class RekamMedisController extends Controller
{
    public function index()
{
    $antrian = TemuDokter::with(['pet.pemilik', 'pet.jenisHewan', 'roleUser.user'])
        ->where('status', 1)
        ->orderBy('no_urut', 'asc')
        ->first(); // ⬅ SATU DATA

    return view('perawat.dashboard_perawat', compact('antrian'));
}

    public function store(Request $request)
    {
        // nanti isi logic
        return redirect()->back()->with('success', 'Rekam medis disimpan');
    }
}