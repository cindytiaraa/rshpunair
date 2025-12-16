<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with([
            'temuDokter.pet.pemilik',
            'temuDokter.roleUser.user'
        ])->orderBy('created_at', 'desc')->get();

        return view('admin.rekam_medis.index', compact('rekamMedis'));
    }

    public function edit($id)
    {
        $rm = RekamMedis::with('temuDokter')->findOrFail($id);
        return view('admin.rekam_medis.edit', compact('rm'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'catatan_admin' => 'nullable'
        ]);

        RekamMedis::findOrFail($id)
            ->update($request->only('catatan_admin'));

        return redirect()->route('admin.rekam_medis.index')
            ->with('success', 'Rekam medis diperbarui');
    }

    public function destroy($id)
    {
        RekamMedis::findOrFail($id)->delete();

        return redirect()->route('admin.rekam_medis.index')
            ->with('success', 'Rekam medis dihapus');
    }
}