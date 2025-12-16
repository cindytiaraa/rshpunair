<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\ReservasiDokter;
use App\Models\TemuDokter;
use Illuminate\Http\Request;

class DashboardPerawatController extends Controller
{
    public function index()
{
    // ambil 1 antrian aktif hari ini
    $antrian = TemuDokter::with([
            'pet.pemilik',
            'pet.jenisHewan',
            'roleUser.user'
        ])
        ->whereDate('waktu_daftar', now()->toDateString())
        ->where('status', 1)
        ->orderBy('no_urut', 'asc')
        ->first(); 

        return view('perawat.dashboard_perawat', compact('antrian'));
    }
}