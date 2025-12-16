@extends('layouts.layouts')

@section('content')

<link rel="stylesheet" href="{{ asset('css/struktur.css') }}">
<link rel="stylesheet" href="{{ asset('css/layouts.css') }}">

<section class="struktur-section">

    <h1 class="title">Struktur Organisasi RSHP UNAIR</h1>

    <!-- DIREKTUR -->
    <div class="leader-box">
        <img src="{{ asset('images/img_direktur.jpg') }}" alt="Direktur RSHP">
        <h2>Drh. Dr. Ika Sri Rahayuningtyas, M.P., drh.</h2>
        <p>Direktur RSHP Universitas Airlangga</p>
    </div>

    <!-- WAKIL DIREKTUR -->
    <div class="wadir-container">

        <div class="wadir-box">
            <img src="{{ asset('images/img_wakildirektur.jpg') }}" alt="Wadir 1">
            <h3>Dr. Nusidianto Triakoso, M.P., drh.</h3>
            <p>Wakil Direktur I<p>
            <p>PELAYANAN MEDIS, PENDIDIKAN, DAN PENELITIAN</p>
        </div>

        <div class="wadir-box">
            <img src="{{ asset('images/img_wakildirektur2.jpg') }}" alt="Wadir 2">
            <h3>Dr. Miyayu Soneta Sofyan, drh., M.Vet.,</h3>
            <p>Wakil Direktur II</p>
            <p>SUMBER DAYA MANUSIA, SARANA PRASARANA DAN KEUANGAN</p>
        </div>

    </div>

    <!-- STRUKTUR LAIN -->
    <h2 class="subtitle">Staf & Unit Pelaksana</h2>

    <div class="staff-container">

        <div class="staff-box">
            <h4>Kepala Administrasi</h4>
            <p>Nama Pegawai</p>
        </div>

        <div class="staff-box">
            <h4>Penanggung Jawab Klinik</h4>
            <p>Nama Pegawai</p>
        </div>

        <div class="staff-box">
            <h4>Bagian Keuangan</h4>
            <p>Nama Pegawai</p>
        </div>

        <div class="staff-box">
            <h4>Bagian Farmasi</h4>
            <p>Nama Pegawai</p>
        </div>

        <div class="staff-box">
            <h4>Teknisi Laboratorium</h4>
            <p>Nama Pegawai</p>
        </div>

    </div>

</section>

@endsection