@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.role.index') }}" class="btn-back">← Kembali</a>
        <h2>Tambah Role</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.role.store') }}" method="POST">
            @csrf

            <label>Nama Role</label>
            <input type="text" name="nama_role" required>

            <div style="margin-top:20px;">
                <button class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>

</div>
@endsection