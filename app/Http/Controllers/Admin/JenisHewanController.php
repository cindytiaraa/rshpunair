<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenis = JenisHewan::all();
        return view('admin.jenis_hewan.index', compact('jenis'));
    }

    public function create()
    {
        return view('admin.jenis_hewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required',
        ]);

        JenisHewan::create([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('admin.jenis_hewan.index')
            ->with('success', 'Jenis hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('admin.jenis_hewan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis' => 'required',
        ]);

        $jenis = JenisHewan::findOrFail($id);
        $jenis->update([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('admin.jenis_hewan.index')
            ->with('success', 'Jenis hewan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        $jenis->deleted_by = auth()->user()->iduser;
        $jenis->save();
        $jenis->delete();

        return redirect()->route('admin.jenis_hewan.index')
            ->with('success', 'Jenis hewan berhasil dihapus!');
    }
}