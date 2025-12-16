@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.rekam_medis.index') }}" class="btn-back">Back</a>
        <h2>Edit Rekam Medis</h2>
    </div>

    <div class="form-card table-card">

        <p><strong>Hewan:</strong> {{ $rm->temuDokter->pet->nama_pet }}</p>
        <p><strong>Diagnosa:</strong> {{ $rm->diagnosa }}</p>

        <form action="{{ route('admin.rekam_medis.update', $rm->idrekam_medis) }}"
              method="POST">
            @csrf
            @method('PUT')

            <label>Catatan Admin</label>
            <textarea name="catatan_admin" rows="4">
                {{ $rm->catatan_admin }}
            </textarea>

            <button class="btn-primary" style="margin-top:15px">
                Update
            </button>
        </form>

    </div>

</div>
@endsection