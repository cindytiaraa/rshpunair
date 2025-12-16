@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/pemilik/pemilik.css') }}">
<div class="pemilik-content">

    <h2 class="page-title">Profil Pemilik</h2>

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
                <td>Jumlah Hewan</td>
                <td>: {{ $jumlah_pet }}</td>
            </tr>
        </table>
    </div>

</div>
@endsection