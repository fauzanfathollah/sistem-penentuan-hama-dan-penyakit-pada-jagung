@extends('layouts.Ahli.app')

@section('title', 'Tambah Penyakit')

@section('Ahli_main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Penyakit</h1>
            </div>

            <form action="{{ route('ahli.penyakit.store') }}" method="POST">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Penyakit</label>
                    <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode') }}" required>
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penyakit</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bobot" class="form-label">Bobot AHP</label>
                    <input type="number" step="0.01" class="form-control @error('bobot') is-invalid @enderror" name="bobot" value="{{ old('bobot') }}" required>
                    @error('bobot')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('ahli.penyakit.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </section>
    </div>
@endsection
