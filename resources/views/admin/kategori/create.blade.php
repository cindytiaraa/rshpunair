@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.kategori.index') }}" class="btn-back">
            ← Kembali
        </a>
        <h2>Tambah Kategori</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf

            <label>Nama Kategori</label>
            <input type="text"
                   name="nama_kategori"
                   value="{{ old('nama_kategori') }}"
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