<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function index()
    {
        $ras = RasHewan::with('jenisHewan')->get();
        return view('admin.ras_hewan.index', compact('ras'));
    }

    public function create()
    {
        $jenis = JenisHewan::all();
        return view('admin.ras_hewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required',
            'idjenis_hewan' => 'required',
        ]);

        RasHewan::create([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras_hewan.index')
            ->with('success', 'Ras hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ras = RasHewan::findOrFail($id);
        $jenis = JenisHewan::all();

        return view('admin.ras_hewan.edit', compact('ras', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required',
            'idjenis_hewan' => 'required',
        ]);

        $ras = RasHewan::findOrFail($id);

        $ras->update([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras_hewan.index')
            ->with('success', 'Ras hewan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ras = RasHewan::findOrFail($id);
        $ras->deleted_by = auth()->user()->iduser;
        $ras->save();
        $ras->delete();

        return redirect()->route('admin.ras_hewan.index')
            ->with('success', 'Ras hewan berhasil dihapus!');
    }
}