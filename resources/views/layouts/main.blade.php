<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'RSHP UNAIR')</title>

    <!-- ROLE BASED CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perawat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resepsionis.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemilik.css') }}">

    @stack('styles')
</head>
<body>

    @include('partials.sidebar')
    @include('partials.header')

    <main class="content">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>