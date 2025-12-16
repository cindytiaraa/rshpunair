<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;

class ProfilPemilikController extends Controller
{
    public function index()
    {
        return view('pemilik.profil');
    }
}