<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    public function cekKoneksi()
    {
        try {
            \DB::connection()->getPdo();
            return response()->json(['status' => 'Koneksi database berhasil.'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Koneksi database gagal: ' . $e->getMessage()], 500);
        }
    }
}