@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="admin-content">

    <div class="page-header between">
        <a href="{{ route('admin.pet.index') }}" class="btn-back">← Kembali</a>
        <h2>Edit Pet</h2>
    </div>

    @include('partials.alert')

    <div class="form-card table-card">
        <form action="{{ route('admin.pet.update', $pet->idpet) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Pet</label>
            <input type="text" name="nama_pet"
                   value="{{ $pet->nama_pet }}" required>

            <label>Jenis Hewan</label>
            <select name="idjenis_hewan">
                @foreach ($jenis as $j)
                    <option value="{{ $j->idjenis_hewan }}"
                        {{ $pet->idjenis_hewan == $j->idjenis_hewan ? 'selected' : '' }}>
                        {{ $j->nama_jenis_hewan }}
                    </option>
                @endforeach
            </select>

            <label>Ras Hewan</label>
            <select name="idras_hewan">
                @foreach ($ras as $r)
                    <option value="{{ $r->idras_hewan }}"
                        {{ $pet->idras_hewan == $r->idras_hewan ? 'selected' : '' }}>
                        {{ $r->nama_ras_hewan }}
                    </option>
                @endforeach
            </select>

            <label>Pemilik</label>
            <select name="idpemilik">
                @foreach ($pemilik as $p)
                    <option value="{{ $p->idpemilik }}"
                        {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                        {{ $p->nama_pemilik }}
                    </option>
                @endforeach
            </select>

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
                <option value="Jantan" {{ $pet->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="Betina" {{ $pet->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
            </select>

            <div style="margin-top:20px;">
                <button class="btn-primary">Update</button>
            </div>
        </form>
    </div>

</div>
@endsection