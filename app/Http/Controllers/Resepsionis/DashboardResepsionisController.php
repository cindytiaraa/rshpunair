<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;
use Carbon\Carbon;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        // Statistik
        $pemilik = Pemilik::count();
        $pets = Pet::count();
        $antrian_total = TemuDokter::count();

        // Ambil antrian hari ini
        $today = Carbon::today()->toDateString();

        $antrian_hari_ini = TemuDokter::with(['pet.pemilik', 'roleUser.user'])
                            ->whereDate('waktu_daftar', $today)
                            ->orderBy('no_urut', 'asc')
                            ->get();

        return view('resepsionis.dashboard_resepsionis', compact(
            'pemilik',
            'pets',
            'antrian_total',
            'antrian_hari_ini'
        ));
    }
}