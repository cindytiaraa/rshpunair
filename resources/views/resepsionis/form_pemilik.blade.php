@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/resepsionis/resepsionis.css') }}">
<div class="resepsionis-content">

    <div class="page-header between">
        <a href="{{ route('resepsionis.dashboard_resepsionis') }}" class="btn-back">← Kembali</a>
        <h2>Tambah Pemilik</h2>
    </div>

    <div class="form-card table-card">

        <form action="{{ route('resepsionis.store_pemilik') }}" method="POST">
            @csrf

            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" required>

            <label>No. HP</label>
            <input type="text" name="no_hp" required>

            <label>Alamat</label>
            <textarea name="alamat" rows="3" required></textarea>

            <button class="btn-primary" style="margin-top:20px">
                Simpan Pemilik
            </button>
        </form>

    </div>

</div>
@endsection