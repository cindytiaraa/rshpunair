@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    {{-- PAGE HEADER --}}
    <div class="page-header between">
        <h2>Data Jenis Hewan</h2>

        <a href="{{ route('admin.jenis_hewan.create') }}" class="btn-primary">
            + Tambah Jenis Hewan
        </a>
    </div>

    {{-- ALERT --}}
    @include('partials.alert')

    {{-- TABLE --}}
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Nama Jenis Hewan</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jenis as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_jenis_hewan }}</td>
                        <td>
                            <a href="{{ route('admin.jenis_hewan.edit', $item->idjenis_hewan) }}"
                               class="btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.jenis_hewan.destroy', $item->idjenis_hewan) }}"
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
                        <td colspan="3" align="center">
                            Data jenis hewan belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection