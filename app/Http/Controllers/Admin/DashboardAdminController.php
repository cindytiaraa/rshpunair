<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\JenisHewan;
use App\Models\RasHewan;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Models\KodeTindakanTerapi;
use App\Models\Pet;
use App\Models\TemuDokter;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard_admin', [
            'users' => User::with(['roleUser.role'])->get(),
            'roles' => Role::all(),
            'jenis' => JenisHewan::all(),
            'ras' => RasHewan::all(),
            'kategori' => Kategori::all(),
            'kategoriKlinis' => KategoriKlinis::all(),
            'kodeTindakanTerapi' => KodeTindakanTerapi::all(),
            'pets' => Pet::all(),
            'temuDokter' => TemuDokter::all()
        ]);
    }
}