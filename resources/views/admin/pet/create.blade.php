@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.pet.index') }}" class="btn-back">← Kembali</a>
        <h2>Tambah Pet</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.pet.store') }}" method="POST">
            @csrf

            <label>Nama Pet</label>
            <input type="text" name="nama_pet" required>

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

            <label>Pemilik</label>
            <select name="idpemilik" required>
                <option value="">-- Pilih Pemilik --</option>
                @foreach ($pemilik as $p)
                    <option value="{{ $p->idpemilik }}">
                        {{ $p->nama_pemilik }}
                    </option>
                @endforeach
            </select>

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Jantan">Jantan</option>
                <option value="Betina">Betina</option>
            </select>

            <div style="margin-top:20px;">
                <button class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>

</div>
@endsection