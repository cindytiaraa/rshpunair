@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.kategori_klinis.index') }}" class="btn-back">
            ← Kembali
        </a>
        <h2>Edit Kategori Klinis</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.kategori_klinis.update', $kategoriKlinis->idkategori_klinis) }}"
              method="POST">
            @csrf
            @method('PUT')

            <label>Nama Kategori Klinis</label>
            <input type="text"
                   name="nama_kategori_klinis"
                   value="{{ old('nama_kategori_klinis', $kategoriKlinis->nama_kategori_klinis) }}"
                   required>

            <div style="margin-top:20px;">
                <button type="submit" class="btn-primary">
                    Update
                </button>
            </div>
        </form>
    </div>

</div>
@endsection