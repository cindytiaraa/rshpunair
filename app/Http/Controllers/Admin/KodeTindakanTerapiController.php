<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodeTindakanTerapi = KodeTindakanTerapi::all();
        return view('admin.kode_tindakan_terapi.index', compact('kodeTindakanTerapi'));
    }

    public function create()
    {
        return view('admin.kode_tindakan_terapi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateKodeTindakanTerapi($request);
        $kodeTindakan = $this->createKodeTindakanTerapi($validatedData);

        return redirect()->route('admin.kode_tindakan_terapi.index')
                        ->with('success', 'Kode tindakan berhasil ditambahkan');
    }

    protected function validateKodeTindakanTerapi(Request $request, $id = null)
    {
        return $request->validate([
            'nama_tindakan' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'unique:kode,deskripsi_tindakan_terapi'
            ],
        ], [
            'deskripsi_tindakan_terapi.required' => 'Nama tindakan wajib diisi.',
            'deskripsi_tindakan_terapi.string' => 'Nama tindakan harus berupa teks.',
            'deskripsi_tindakan_terapi.max' => 'Nama tindakan maksimal 255 karakter.',
            'deskripsi_tindakan_terapi.min' => 'Nama tindakan minimal 3 karakter.',
            'deskripsi_tindakan_terapi.unique' => 'Nama tindakan sudah ada.'
        ]);
    }

    protected function createKodeTindakanTerapi(array $data)
    {
        try {
            return KodeTindakanTerapi::create([
                'deskripsi_tindakan_terapi' => $this->formatNamaTindakan($data['nama_tindakan']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data kode tindakan: ' . $e->getMessage());
        }
    }

    protected function formatNamaTindakan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

}
