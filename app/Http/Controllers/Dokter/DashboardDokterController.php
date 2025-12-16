<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;

class DashboardDokterController extends Controller
{
    public function index()
    {
        $rekam_medis = RekamMedis::with([
            'temuDokter.pet.pemilik'
        ])->get();


        return view('dokter.dashboard_dokter', compact('rekam_medis'));
    }
}