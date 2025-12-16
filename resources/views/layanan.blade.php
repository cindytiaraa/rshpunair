@extends('layouts.layouts')

@section('content')

<link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
<link rel="stylesheet" href="{{ asset('css/layanan.css') }}">

<section class="section">
    <h2 class="section-title">Layanan RSHP UNAIR</h2>

    <div class="service-card-grid">

        <div class="service-card">
            <div class="icon">🩺</div>
            <h3>Pemeriksaan Umum</h3>
            <p>Pemeriksaan kesehatan menyeluruh untuk hewan kesayangan Anda.</p>
        </div>

        <div class="service-card">
            <div class="icon">💉</div>
            <h3>Vaksinasi</h3>
            <p>Layanan vaksinasi lengkap untuk mencegah penyakit menular.</p>
        </div>

        <div class="service-card">
            <div class="icon">🔬</div>
            <h3>Laboratorium</h3>
            <p>Pemeriksaan darah, urin, feses, dan uji biologis lainnya.</p>
        </div>

        <div class="service-card">
            <div class="icon">🐾</div>
            <h3>Bedah Minor & Mayor</h3>
            <p>Tindakan pembedahan dengan fasilitas lengkap dan aman.</p>
        </div>

        <div class="service-card">
            <div class="icon">🌡</div>
            <h3>Perawatan Inap</h3>
            <p>Perawatan intensif dengan pemantauan dokter & perawat.</p>
        </div>

        <div class="service-card">
            <div class="icon">🧠</div>
            <h3>Konsultasi Spesialis</h3>
            <p>Konsultasi terkait perilaku, nutrisi, dan diagnosa khusus.</p>
        </div>

    </div>
</section>

@endsection