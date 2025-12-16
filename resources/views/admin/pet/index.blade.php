@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header">
        <h2>Data Pet</h2>
        <a href="{{ route('admin.pet.create') }}" class="btn-primary">
            + Tambah Pet
        </a>
    </div>

    @include('partials.alert')

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pet</th>
                    <th>Jenis</th>
                    <th>Ras</th>
                    <th>Pemilik</th>
                    <th>Kelamin</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pets as $pet)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pet->nama_pet }}</td>
                    <td>{{ $pet->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                    <td>{{ $pet->rasHewan->nama_ras_hewan ?? '-' }}</td>
                    <td>{{ $pet->pemilik->nama_pemilik ?? '-' }}</td>
                    <td>{{ $pet->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('admin.pet.edit', $pet->idpet) }}"
                           class="btn-warning">Edit</a>

                        <form action="{{ route('admin.pet.destroy', $pet->idpet) }}"
                              method="POST"
                              class="inline-form"
                              onsubmit="return confirm('Yakin hapus pet ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" align="center">Belum ada data pet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection