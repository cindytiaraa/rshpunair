<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temu = TemuDokter::all();
        return view('admin.temu_dokter.index', compact('temu'));
    }

    public function edit($id)
    {
        return view('admin.temu_dokter.edit');
    }
}