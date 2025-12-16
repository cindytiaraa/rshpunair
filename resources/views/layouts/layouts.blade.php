<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSHP UNAIR</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    {{-- ================= HEADER ================= --}}
    <header class="public-header">
        <div class="header-inner">

            {{-- LOGO KIRI --}}
            <img src="{{ asset('images/img_rshp.jpg') }}"
                 alt="Logo UNAIR"
                 class="logo-left">

            {{-- JUDUL --}}
            <div class="title-block">
                <h1>Rumah Sakit Hewan Pendidikan</h1>
                <p>Universitas Airlangga</p>
            </div>

            {{-- LOGO KANAN --}}
            <img src="{{ asset('images/img_unair.png') }}"
                 alt="Logo RSHP"
                 class="logo-right">

        </div>
    </header>

    {{-- ================= NAVBAR ================= --}}
    <nav class="public-navbar">

        <div class="menu-center">
            <a href="{{ route('dashboard') }}" class="nav-item">Dashboard</a>
            <a href="{{ route('layanan') }}" class="nav-item">Layanan</a>
            <a href="{{ route('struktur') }}" class="nav-item">Struktur</a>
        </div>

        <a href="{{ route('login') }}" class="nav-right">
            Login
        </a>

    </nav>

    {{-- ================= MAIN CONTENT ================= --}}
    <main>
        @yield('content')
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="public-footer">
        <p>
            © {{ date('Y') }} RSHP Universitas Airlangga • Fakultas Kedokteran Hewan
        </p>
    </footer>

</body>
</html>