<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;

class ProfilPerawatController extends Controller
{
    public function index()
    {
        return view('perawat.profil');
    }
}