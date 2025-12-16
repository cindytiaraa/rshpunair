@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header">
        <h2>Data Role</h2>
        <a href="{{ route('admin.role.create') }}" class="btn-primary">
            + Tambah Role
        </a>
    </div>

    @include('partials.alert')

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Role</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->nama_role }}</td>
                    <td>
                        <a href="{{ route('admin.role.edit', $role->idrole) }}"
                           class="btn-warning">Edit</a>

                        <form action="{{ route('admin.role.destroy', $role->idrole) }}"
                              method="POST"
                              class="inline-form"
                              onsubmit="return confirm('Yakin hapus role ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" align="center">Belum ada data role</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection