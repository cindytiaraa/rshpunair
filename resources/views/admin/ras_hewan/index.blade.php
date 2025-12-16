@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header">
        <h2>Data Ras Hewan</h2>
        <a href="{{ route('admin.ras_hewan.create') }}" class="btn-primary">
            + Tambah Ras Hewan
        </a>
    </div>

    @include('partials.alert')

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ras</th>
                    <th>Jenis Hewan</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rasHewan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_ras_hewan }}</td>
                        <td>{{ $item->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.ras_hewan.edit', $item->idras_hewan) }}"
                               class="btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.ras_hewan.destroy', $item->idras_hewan) }}"
                                  method="POST"
                                  class="inline-form"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" align="center">Data belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection