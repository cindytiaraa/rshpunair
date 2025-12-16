@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/resepsionis/resepsionis.css') }}">
<div class="resepsionis-content">

    <div class="page-header between">
        <a href="{{ route('resepsionis.dashboard_resepsionis') }}" class="btn-back">← Kembali</a>
        <h2>Tambah Pet</h2>
    </div>

    <div class="form-card table-card">

        <form action="{{ route('resepsionis.store_pet') }}" method="POST">
            @csrf

            <label>Nama Pet</label>
            <input type="text" name="nama_pet" required>

            <label>Pemilik</label>
            <select name="idpemilik" required>
                <option value="">-- Pilih Pemilik --</option>
                @foreach ($pemilik as $p)
                    <option value="{{ $p->idpemilik }}">
                        {{ $p->nama_pemilik }}
                    </option>
                @endforeach
            </select>

            <label>Jenis Hewan</label>
            <select name="idjenis_hewan" required>
                <option value="">-- Pilih Jenis --</option>
                @foreach ($jenis as $j)
                    <option value="{{ $j->idjenis_hewan }}">
                        {{ $j->nama_jenis_hewan }}
                    </option>
                @endforeach
            </select>

            <label>Ras Hewan</label>
            <select name="idras_hewan" required>
                <option value="">-- Pilih Ras --</option>
                @foreach ($ras as $r)
                    <option value="{{ $r->idras_hewan }}">
                        {{ $r->nama_ras_hewan }}
                    </option>
                @endforeach
            </select>

            <button class="btn-primary" style="margin-top:20px">
                Simpan Pet
            </button>
        </form>

    </div>

</div>
@endsection