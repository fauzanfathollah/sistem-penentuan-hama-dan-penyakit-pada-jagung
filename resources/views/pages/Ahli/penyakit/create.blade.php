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

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Penyakit</label>
                <input type="text" class="form-control" name="kode" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="4"></textarea>
            </div>
  
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot AHP</label>
                <input type="number" step="0.01" class="form-control" name="bobot" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('ahli.penyakit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</div>
@endsection
