<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::all();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        return view('admin.pet.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validatePet($request);
        $pet = $this->createPet($validatedData);

        return redirect()->route('admin.pet.index')
                        ->with('success', 'Data pet berhasil ditambahkan');
    }

    protected function validatePet(Request $request, $id = null)
    {
        return $request->validate([
            'nama_pet' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'unique:pet,nama_pet'
            ],
        ], [
            'nama_pet.required' => 'Nama pet wajib diisi.',
            'nama_pet.string' => 'Nama pet harus berupa teks.',
            'nama_pet.max' => 'Nama pet maksimal 255 karakter.',
            'nama_pet.min' => 'Nama pet minimal 3 karakter.',
            'nama_pet.unique' => 'Nama pet sudah ada.'
        ]);
    }

    protected function createPet(array $data)
    {
        try {
            return Pet::create([
                'nama_pet' => $this->formatNamaPet($data['nama_pet']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data pet: ' . $e->getMessage());
        }
    }

    protected function formatNamaPet($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

}
