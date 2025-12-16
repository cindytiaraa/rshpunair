<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use Illuminate\Support\Facades\Auth;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::where('iduser', Auth::id())
            ->with([
                'pet.temuDokter.rekamMedis'
            ])
            ->first();

        if (!$pemilik) {
            return view('pemilik.dashboard_pemilik', [
                'pemilik' => null
            ]);
        }

        return view('pemilik.dashboard_pemilik', compact('pemilik'));
    }
}