@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/perawat/perawat.css') }}">

<div class="perawat-content">

    <h2 class="page-title">Dashboard Perawat</h2>
    <p class="page-subtitle">
        Selamat datang, perawat. Silakan kelola rekam medis pasien hari ini.
    </p>

    <div class="menu-grid">
        <a href="{{ route('perawat.rekam_medis.index') }}" class="menu-card">
            🩺
            <h3>Rekam Medis</h3>
            <p>Isi dan kelola rekam medis pasien</p>
        </a>

        <a href="{{ route('perawat.profil') }}" class="menu-card">
            👤
            <h3>Profil</h3>
            <p>Lihat data profil perawat</p>
        </a>
    </div>

</div>
@endsection