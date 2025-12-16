<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\JenisHewan;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function create()
    {
        return view('resepsionis.form_pet', [
            'pemilik' => Pemilik::all(),
            'jenis' => JenisHewan::all(),
            'ras' => RasHewan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpemilik' => 'required',
            'nama_pet' => 'required',
            'idjenis_hewan' => 'required',
            'idras_hewan' => 'required',
        ]);

        // simpan data hewan
        Pet::create([
            'idpemilik' => $request->idpemilik,
            'nama_pet' => $request->nama_pet,
            'idjenis_hewan' => $request->idjenis_hewan,
            'idras_hewan' => $request->idras_hewan,
        ]);

        return redirect()
            ->route('resepsionis.dashboard_resepsionis')
            ->with('success', 'Hewan berhasil ditambahkan!');
    }
}