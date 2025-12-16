@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/dokter/dokter.css') }}">
<div class="dokter-content">

    <h2 class="page-title">Dashboard Dokter</h2>
    <p class="page-subtitle">
        Selamat datang Dokter, silakan melakukan validasi rekam medis pasien.
    </p>

    <div class="menu-grid">
        <a href="{{ route('dokter.rekam_medis') }}" class="menu-card">
            🩺
            <h3>Rekam Medis</h3>
            <p>Validasi dan lihat rekam medis pasien</p>
        </a>

        <a href="{{ route('dokter.profil') }}" class="menu-card">
            👨‍⚕
            <h3>Profil</h3>
            <p>Lihat profil dokter</p>
        </a>
    </div>

</div>
@endsection