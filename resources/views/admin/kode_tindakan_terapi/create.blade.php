@extends('layouts.main')

@section('title', 'Tambah Kode Tindakan')

@section('content')
<link rel="stylesheet" href="{{ asset('css/partials.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Tambah Kode Tindakan Terapi</h4>
                </div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('kode.store') }}" method="POST">
                        @csrf
                        <div class="mb3">
                            <label for="deskripsi_tindakan_terapi" class="form-label">Nama Tindakan <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                                id="deskripsi_tindakan_terapi"
                                name="deskripsi_tindakan_terapi"
                                value="{{ old('deskripsi_tindakan_terapi') }}"
                                placeholder="Masukkan deskripsi tindakan terapi"
                                required>
                            @error('deskripsi_tindakan_terapi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('kode.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection