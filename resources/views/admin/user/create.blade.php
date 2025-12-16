@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.user.index') }}" class="btn-back">← Kembali</a>
        <h2>Tambah User</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="nama" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Role</label>
            <select name="role" required>
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $r)
                    <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
                @endforeach
            </select>

            <div style="margin-top:20px;">
                <button class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>

</div>
@endsection