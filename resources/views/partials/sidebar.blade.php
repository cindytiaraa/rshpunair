<aside class="sidebar">

    <h3 class="sidebar-title">RSHP UNAIR</h3>

    @php
    $role = auth()->user()->roleUser->first()?->role?->nama_role;
@endphp

@if ($role === 'Administrator')
     {{-- ADMIN --}}
    <div class="sidebar-admin">

        <hr>
        <strong>Data Transaksi</strong>
        <a class="dashboard" href="{{ route('admin.dashboard_admin') }}">Dashboard</a>
        <a class="user" href="{{ route('admin.user.index') }}">User</a>
        <a class="role" href="{{ route('admin.role.index') }}">Role</a>
        <a class="jenis-hewan" href="{{ route('admin.jenis_hewan.index') }}">Jenis Hewan</a>
        <a class="ras-hewan" href="{{ route('admin.ras_hewan.index') }}">Ras Hewan</a>
        <a class="kategori" href="{{ route('admin.kategori.index') }}">Kategori</a>
        <a class="kategori-klinis" href="{{ route('admin.kategori_klinis.index') }}">Kategori Klinis</a>
        
        <hr>
        <strong>Data Transaksi</strong>
        <a class="pemilik" href="{{ route('admin.pemilik.index') }}">Pemilik</a>
        <a class="pet" href="{{ route('admin.pet.index') }}">Pet</a>
        <a class="temu_dokter" href="{{ route('admin.temu_dokter.index') }}">Temu Dokter</a>
        <a class="rekam_medis" href="{{ route('admin.rekam_medis.index') }}">Rekam Medis</a>
    </div>

@elseif ($role === 'Dokter')
    {{-- DOKTER --}}
    <div class="sidebar-dokter">
        <a class="dashboard" href="{{ route('dokter.dashboard_dokter') }}">Dashboard</a>
        <a class="rekam-medis" href="{{ route('dokter.rekam_medis') }}">Rekam Medis</a> 
        <a class="profile" href="{{ route('dokter.profil') }}">Profil</a>
    </div>

@elseif ($role === 'Perawat')
    {{-- PERAWAT --}}
    <div class="sidebar-perawat">
        <a class="dashboard" href="{{ route('perawat.dashboard_perawat') }}">Dashboard</a>
        <a class="rekam-medis" href="{{ route('perawat.rekam_medis') }}">Rekam Medis</a>
        <a class="profile" href="{{ route('perawat.profil') }}">Profil</a>
    </div>

@elseif ($role === 'Resepsionis')
     {{-- RESEPSIONIS --}}
    <div class="sidebar-resepsionis">
        <a class="dashboard" href="{{ route('resepsionis.dashboard_resepsionis') }}">Dashboard</a>
        <a class="form-pemilik" href="{{ route('resepsionis.form_pemilik') }}">Pemilik</a>
        <a class="form-pet" href="{{ route('resepsionis.form_pet') }}">Pet</a>
        <a class="form_antrian" href="{{ route('resepsionis.form_antrian') }}">Temu Dokter</a>
    </div>

@elseif ($role === 'Pemilik')
    {{-- PEMILIK --}}
    <div class="sidebar-pemilik">
        <a class="dashboard" href="{{ route('pemilik.dashboard_pemilik') }} ">Dashboard</a>
        <a class="rekam-medis" href="{{ route('pemilik.rekam_medis') }}">Rekam Medis</a>
        <a class="profile" href="{{ route('pemilik.profil') }}">Profil</a>
    </div>
@endif


</aside>