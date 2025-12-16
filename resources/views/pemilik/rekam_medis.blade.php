@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/pemilik/pemilik.css') }}">
<div class="pemilik-content">

    <h2 class="page-title">Rekam Medis Hewan</h2>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Hewan</th>
                    <th>Dokter</th>
                    <th>Diagnosa</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($rekam_medis as $rm)
                <tr>
                    <td>{{ $rm->created_at->format('d-m-Y') }}</td>
                    <td>{{ $rm->temuDokter->pet->nama_pet }}</td>
                    <td>{{ $rm->dokter_pemeriksa }}</td>
                    <td>{{ $rm->diagnosa }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">
                        Belum ada rekam medis
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection