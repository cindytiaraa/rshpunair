@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header">
        <h2>Data Rekam Medis</h2>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hewan</th>
                    <th>Pemilik</th>
                    <th>Dokter</th>
                    <th>Diagnosa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rekamMedis as $rm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rm->temuDokter->pet->nama_pet }}</td>
                    <td>{{ $rm->temuDokter->pet->pemilik->nama_pemilik }}</td>
                    <td>{{ $rm->temuDokter->roleUser->user->nama ?? '-' }}</td>
                    <td>{{ $rm->diagnosa }}</td>
                    <td>
                        <a href="{{ route('admin.rekam_medis.edit', $rm->idrekam_medis) }}"
                           class="btn-warning">Edit</a>

                        <form action="{{ route('admin.rekam_medis.destroy', $rm->idrekam_medis) }}"
                              method="POST" class="inline-form"
                              onsubmit="return confirm('Hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection