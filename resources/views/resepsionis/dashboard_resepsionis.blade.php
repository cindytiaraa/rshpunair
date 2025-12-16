@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/resepsionis/resepsionis.css') }}">
<div class="resepsionis-content">

    <h2 class="page-title">Dashboard Resepsionis</h2>
    <p class="page-subtitle">RSHP UNAIR – Pendaftaran Pasien</p>

    <div class="menu-grid">

        <a href="{{ route('resepsionis.form_pemilik') }}" class="menu-card">
            <div class="icon">👤</div>
            <h3>Daftar Pemilik</h3>
            <p>Input data pemilik hewan</p>
        </a>

        <a href="{{ route('resepsionis.form_pet') }}" class="menu-card">
            <div class="icon">🐾</div>
            <h3>Daftar Pet</h3>
            <p>Input data hewan</p>
        </a>

        <a href="{{ route('resepsionis.form_antrian') }}" class="menu-card">
            <div class="icon">📋</div>
            <h3>Buat Antrian</h3>
            <p>Pendaftaran temu dokter</p>
        </a>

    </div>

</div>
@endsection