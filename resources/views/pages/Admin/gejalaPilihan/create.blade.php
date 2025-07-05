@extends('layouts.Admin.app')

@section('title', 'Tambah Gejala Pilihan')

@section('Admin_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pilihan Gejala</h1>
        </div>
    <form action="{{ route('admin.gejalaPilihan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kriteria" class="form-label">Kriteria</label>
            <select name="kriteria_id" class="form-control" required>
                <option value="">-- Pilih Kriteria --</option>
                @foreach($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Gejala</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.gejalaPilihan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
