<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekam_medis = RekamMedis::with([
            'temuDokter.pet.pemilik'
        ])->get();

        return view('dokter.rekam_medis', compact('rekam_medis'));
    }

    public function validasi($id)
    {
        $rekam = RekamMedis::findOrFail($id);

        $rekam->update([
            'status_validasi' => 1
        ]);

        return redirect()->back()
            ->with('success', 'Rekam medis berhasil divalidasi dokter');
    }
}