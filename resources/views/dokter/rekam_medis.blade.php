@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/dokter/dokter.css') }}">
<div class="dokter-content">

    <h2 class="page-title">Rekam Medis Pasien</h2>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Hewan</th>
                    <th>Pemilik</th>
                    <th>Diagnosa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($rekam_medis as $rm)
                <tr>
                    <td>{{ $rm->temuDokter->pet->nama_pet }}</td>
                    <td>{{ $rm->temuDokter->pet->pemilik->nama_pemilik }}</td>
                    <td>{{ $rm->diagnosa }}</td>
                    <td>
                        {{ $rm->status_validasi == 1 ? 'Tervalidasi' : 'Menunggu' }}
                    </td>
                    <td>
                        @if ($rm->status_validasi == 0)
                        <form action="{{ route('dokter.rekam_medis.validasi', $rm->idrekam_medis) }}" method="POST">
                            @csrf
                            <button class="btn-primary">Validasi</button>
                        </form>
                        @else
                            <span class="badge-success">✔</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Belum ada rekam medis</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection