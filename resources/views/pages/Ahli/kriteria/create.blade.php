@extends('layouts.Ahli.app')

@section('title', 'Tambah Kriteria')

@section('content')
<div class="container mt-4">
    <h3>Tambah Kriteria</h3>

    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_kriteria">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="bobot">Bobot</label>
            <input type="number" step="0.01" name="bobot" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection