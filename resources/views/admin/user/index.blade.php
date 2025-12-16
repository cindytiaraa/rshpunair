@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header">
        <h2>Data User</h2>
        <a href="{{ route('admin.user.create') }}" class="btn-primary">
            + Tambah User
        </a>
    </div>

    @include('partials.alert')

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roleUser->first()?->role?->nama_role ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user->iduser) }}"
                           class="btn-warning">Edit</a>

                        <form action="{{ route('admin.user.destroy', $user->iduser) }}"
                              method="POST"
                              class="inline-form"
                              onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" align="center">Belum ada user</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection