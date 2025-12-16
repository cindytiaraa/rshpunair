@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.jenis_hewan.index') }}" class="btn-back">
            ← Kembali
        </a>
        <h2>Tambah Jenis Hewan</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.jenis_hewan.store') }}" method="POST">
            @csrf

            <label>Nama Jenis Hewan</label>
            <input type="text"
                   name="nama_jenis_hewan"
                   value="{{ old('nama_jenis_hewan') }}"
                   required>

            <div style="margin-top:20px;">
                <button type="submit" class="btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection