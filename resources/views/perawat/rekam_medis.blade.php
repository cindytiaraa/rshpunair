@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/perawat/perawat.css') }}">
<div class="perawat-content">

    <h2 class="page-title">Rekam Medis Pasien</h2>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Hewan</th>
                    <th>Pemilik</th>
                    <th>Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($antrian as $item)
                    <tr>
                        <td>{{ $item->no_urut }}</td>
                        <td>{{ $item->pet->nama_pet }}</td>
                        <td>{{ $item->pet->pemilik->nama_pemilik }}</td>
                        <td>{{ $item->roleUser->user->nama ?? '-' }}</td>
                        <td>
                            <a href="{{ route('perawat.rekam_medis.create', $item->idreservasi_dokter) }}"
                               class="btn-primary">
                                Isi Rekam Medis
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center">Tidak ada antrian</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection