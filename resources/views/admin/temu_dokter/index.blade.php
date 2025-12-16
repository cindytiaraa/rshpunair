@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.temu_dokter.index') }}" class="btn-back">Back</a>
        <h2>Edit Temu Dokter</h2>
    </div>

    <div class="form-card table-card">

        <form action="{{ route('admin.temu_dokter.update', $temu->idreservasi_dokter) }}"
              method="POST">
            @csrf
            @method('PUT')

            <label>Dokter</label>
            <select name="idrole_user" required>
                @foreach ($dokter as $d)
                    <option value="{{ $d->idrole_user }}"
                        {{ $temu->idrole_user == $d->idrole_user ? 'selected' : '' }}>
                        {{ $d->user->nama }}
                    </option>
                @endforeach
            </select>

            <label>Status</label>
            <select name="status">
                <option value="1" {{ $temu->status == 1 ? 'selected' : '' }}>Menunggu</option>
                <option value="2" {{ $temu->status == 2 ? 'selected' : '' }}>Diproses</option>
                <option value="3" {{ $temu->status == 3 ? 'selected' : '' }}>Selesai</option>
            </select>

            <button class="btn-primary" style="margin-top:15px">
                Update
            </button>
        </form>

    </div>

</div>
@endsection