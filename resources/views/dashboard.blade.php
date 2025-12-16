@extends('layouts.layouts')

@section('content')

<link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<!-- SECTION 1 -->
<section class="section section-1">
    <div class="left">
        <h2>Pendaftaran Online RSHP</h2>
        <p>
            RSHP UNAIR menyediakan layanan pendaftaran pasien hewan secara online
            untuk mempermudah pemilik hewan mengakses pelayanan kesehatan.
        </p>

        <a href="/login" class="btn-primary">Daftar Online</a>
    </div>

    <div class="right">
        <iframe width="100%" height="300"
            src="https://www.youtube.com/embed/dQw4w9WgXcQ"
            allowfullscreen></iframe>
    </div>
</section>

<!-- SECTION 2 -->
<section class="section section-2">
    <h2>Visi & Misi RSHP UNAIR</h2>

    <div class="visi-misi-box">
        <div class="visi">
            <h3>Visi</h3>
            <p>
                Menjadi pusat layanan kesehatan hewan unggul yang berorientasi pada pendidikan,
                penelitian, dan pengabdian kepada masyarakat.
            </p>
        </div>

        <div class="misi">
            <h3>Misi</h3>
            <ul>
                <li>Memberikan pelayanan kesehatan hewan yang profesional.</li>
                <li>Mendukung kegiatan pendidikan veteriner.</li>
                <li>Mengembangkan inovasi di bidang kesehatan hewan.</li>
                <li>Meningkatkan kesejahteraan hewan melalui pelayanan berkualitas.</li>
            </ul>
        </div>
    </div>
</section>

<!-- SECTION 3 -->
<section class="section section-3">
    <h2>Berita Terbaru</h2>

    <div class="card-container">

        <div class="card">
            <img src="https://source.unsplash.com/400x300/?veterinary" alt="">
            <h3>Pelayanan Baru RSHP 2025</h3>
            <p>RSHP UNAIR membuka layanan konsultasi darurat 24 jam.</p>
            <a href="#" class="btn-secondary">Baca Selengkapnya</a>
        </div>

        <div class="card">
            <img src="https://source.unsplash.com/400x300/?animals" alt="">
            <h3>Workshop Edukasi Kesehatan Hewan</h3>
            <p>Kegiatan edukasi diperuntukkan bagi pemilik hewan peliharaan.</p>
            <a href="#" class="btn-secondary">Baca Selengkapnya</a>
        </div>

        <div class="card">
            <img src="https://source.unsplash.com/400x300/?pets" alt="">
            <h3>Program Vaksinasi Murah</h3>
            <p>Program vaksinasi dengan harga terjangkau kini tersedia di RSHP.</p>
            <a href="#" class="btn-secondary">Baca Selengkapnya</a>
        </div>

    </div>
</section>

@endsection