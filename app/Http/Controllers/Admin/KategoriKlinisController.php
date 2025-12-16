<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategori_klinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required',
        ]);

        KategoriKlinis::create([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()
            ->route('admin.kategori_klinis.index')
            ->with('success', 'Kategori Klinis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategoriKlinis = KategoriKlinis::findOrFail($id);
        return view('admin.kategori_klinis.edit', compact('kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required',
        ]);

        $kategoriKlinis = KategoriKlinis::findOrFail($id);

        $kategoriKlinis->update([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()
            ->route('admin.kategori_klinis.index')
            ->with('success', 'Kategori Klinis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategoriKlinis = KategoriKlinis::findOrFail($id);
        $kategoriKlinis->deleted_by = auth()->user()->iduser;
        $kategoriKlinis->save();
        $kategoriKlinis->delete();

        return redirect()
            ->route('admin.kategori_klinis.index')
            ->with('success', 'Kategori Klinis berhasil dihapus!');
    }
}