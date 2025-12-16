@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/resepsionis/resepsionis.css') }}">
<div class="resepsionis-content">

    <div class="page-header between">
        <a href="{{ route('resepsionis.dashboard_resepsionis') }}" class="btn-back">← Kembali</a>
        <h2>Pendaftaran Temu Dokter</h2>
    </div>

    <div class="form-card table-card">

        <form action="{{ route('resepsionis.store_antrian') }}" method="POST">
            @csrf

            <label>Pemilik</label>
            <select name="idpemilik" id="pemilik" required>
                <option value="">-- Pilih Pemilik --</option>
                @foreach ($pemilik as $p)
                    <option value="{{ $p->idpemilik }}">
                        {{ $p->nama_pemilik }}
                    </option>
                @endforeach
            </select>

            <label>Pet</label>
            <select name="idpet" id="pet" required>
                <option value="">-- Pilih Pet --</option>
            </select>

            <label>Dokter</label>
            <select name="idrole_user" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach ($dokter as $d)
                    <option value="{{ $d->idrole_user }}">
                        {{ $d->user->nama }}
                    </option>
                @endforeach
            </select>

            <button class="btn-primary" style="margin-top:20px">
                Daftarkan Antrian
            </button>
        </form>

    </div>

</div>

{{-- AJAX PET --}}
<script>
document.getElementById('pemilik').addEventListener('change', function () {
    fetch('/resepsionis/get-pet/' + this.value)
        .then(res => res.json())
        .then(data => {
            let pet = document.getElementById('pet');
            pet.innerHTML = '<option value="">-- Pilih Pet --</option>';
            data.forEach(p => {
                pet.innerHTML += <option value="${p.idpet}">${p.nama_pet}</option>;
            });
        });
});
</script>

@endsection