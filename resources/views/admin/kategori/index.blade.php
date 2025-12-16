@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header">
        <h2>Data Kategori</h2>
        <a href="{{ route('admin.kategori.create') }}" class="btn-primary">
            + Tambah Kategori
        </a>
    </div>

    @include('partials.alert')

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('admin.kategori.edit', $item->idkategori) }}"
                               class="btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.kategori.destroy', $item->idkategori) }}"
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
                        <td colspan="3" align="center">Data belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection