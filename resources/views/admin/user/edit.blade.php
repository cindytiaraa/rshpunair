@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.user.index') }}" class="btn-back">← Kembali</a>
        <h2>Edit User</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.user.update', $data->iduser) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input type="text" name="nama"
                   value="{{ $data->nama }}" required>

            <label>Email</label>
            <input type="email" name="email"
                   value="{{ $data->email }}" required>

            <label>Password (Opsional)</label>
            <input type="password" name="password">

            <label>Role</label>
            <select name="role" required>
                @foreach ($roles as $r)
                    <option value="{{ $r->idrole }}"
                        {{ $data->roleUser->first()?->idrole == $r->idrole ? 'selected' : '' }}>
                        {{ $r->nama_role }}
                    </option>
                @endforeach
            </select>

            <div style="margin-top:20px;">
                <button class="btn-primary">Update</button>
            </div>
        </form>
    </div>

</div>
@endsection