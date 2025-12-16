@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/perawat/perawat.css') }}">
<div class="perawat-content">

    <h2 class="page-title">Profil Perawat</h2>

    <div class="profile-card">
        <table class="profile-table">
            <tr>
                <td>Nama</td>
                <td>: {{ auth()->user()->nama }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <td>Role</td>
                <td>: Perawat</td>
            </tr>
        </table>
    </div>

</div>
@endsection