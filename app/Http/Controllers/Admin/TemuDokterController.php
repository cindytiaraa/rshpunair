<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TemuDokterController extends Controller
{
    public function index()
    {
        return view('admin.temu_dokter.index');
    }

    public function edit($id)
    {
        return view('admin.temu_dokter.edit');
    }
}