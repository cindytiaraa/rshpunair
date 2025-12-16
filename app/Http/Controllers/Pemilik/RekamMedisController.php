<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    public function index()
    {
        return view('pemilik.rekam_medis');
    }
}