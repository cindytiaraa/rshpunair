@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/pemilik/pemilik.css') }}">
<div class="pemilik-content">

    <h2 class="page-title">Dashboard Pemilik</h2>
    <p class="page-subtitle">
        Pantau jadwal temu dokter dan riwayat pemeriksaan hewan kesayangan Anda.
    </p>

    <div class="menu-grid">
        <a href="{{ route('pemilik.rekam_medis') }}" class="menu-card">
            📋
            <h3>Rekam Medis</h3>
            <p>Lihat riwayat pemeriksaan hewan</p>
        </a>

        <a href="{{ route('pemilik.profil') }}" class="menu-card">
            👤
            <h3>Profil</h3>
            <p>Data pemilik & hewan</p>
        </a>
    </div>

</div>
@endsection