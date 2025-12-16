@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

<div class="admin-dashboard">

    {{-- STATISTIK RINGKAS --}}
    <div class="stats-grid">
        <div class="stat-box">
            <h3>{{ $users->count() }}</h3>
            <p>Total User</p>
        </div>
        <div class="stat-box">
            <h3>{{ $roles->count() }}</h3>
            <p>Total Role</p>
        </div>
        <div class="stat-box">
            <h3>{{ $jenis->count() }}</h3>
            <p>Jenis Hewan</p>
        </div>
        <div class="stat-box">
            <h3>{{ $ras->count() }}</h3>
            <p>Ras Hewan</p>
        </div>
    </div>

    {{-- AKSES CEPAT --}}
    <h2 class="section-title">Akses Cepat</h2>

    <div class="quick-grid">

        <a href="{{ route('admin.user.index') }}" class="quick-card">
            <div class="icon">👤</div>
            <h3>User</h3>
            <p>Kelola data pengguna</p>
        </a>

        <a href="{{ route('admin.role.index') }}" class="quick-card">
            <div class="icon">🛡</div>
            <h3>Role</h3>
            <p>Kelola hak akses</p>
        </a>

        <a href="{{ route('admin.jenis_hewan.index') }}" class="quick-card">
            <div class="icon">🐾</div>
            <h3>Jenis Hewan</h3>
            <p>Kelola master jenis</p>
        </a>

        <a href="{{ route('admin.ras_hewan.index') }}" class="quick-card">
            <div class="icon">🐶</div>
            <h3>Ras Hewan</h3>
            <p>Kelola master ras</p>
        </a>

        <a href="{{ route('admin.kategori.index') }}" class="quick-card">
            <div class="icon">📂</div>
            <h3>Kategori</h3>
            <p>Kelola kategori umum</p>
        </a>

        <a href="{{ route('admin.kategori_klinis.index') }}" class="quick-card">
            <div class="icon">⚕</div>
            <h3>Kategori Klinis</h3>
            <p>Kelola kategori medis</p>
        </a>

    </div>

</div>

@endsection