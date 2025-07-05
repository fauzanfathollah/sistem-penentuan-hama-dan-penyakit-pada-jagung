@extends('layouts.Admin.app')

@section('title', 'Edit Gejala Pilihan')

@section('Admin_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pilihan Gejala</h1>
        </div>
    <form action="{{ route('admin.gejalaPilihan.update', $gejalaPilihan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kriteria" class="form-label">Kriteria</label>
            <select name="kriteria_id" class="form-control" required>
                @foreach($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" {{ $kriteria->id == $gejalaPilihan->kriteria_id ? 'selected' : '' }}>
                        {{ $kriteria->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Gejala</label>
            <input type="text" class="form-control" name="nama" value="{{ $gejalaPilihan->nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.gejalaPilihan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
