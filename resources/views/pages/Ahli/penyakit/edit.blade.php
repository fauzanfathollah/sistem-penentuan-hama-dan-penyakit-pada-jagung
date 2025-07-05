@extends('layouts.Ahli.app')

@section('title', 'Edit Penyakit')

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Penyakit</h1>
        </div>

        <form action="{{ route('ahli.penyakit.update', $penyakit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Penyakit</label>
                <input type="text" class="form-control" name="kode" value="{{ $penyakit->kode }}" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" name="nama" value="{{ $penyakit->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="4">{{ $penyakit->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot AHP</label>
                <input type="number" step="0.01" class="form-control" name="bobot" value="{{ number_format($penyakit->bobot, 2, '.', '') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('ahli.penyakit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</div>
@endsection
