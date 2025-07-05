@extends('layouts.Ahli.app')

@section('title', 'Edit Gejala')

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header"><h1>Edit Gejala</h1></div>

        <form action="{{ route('ahli.gejala.update', $gejala->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kriteria_id">Kriteria:</label>
                <select name="kriteria_id" id="kriteria_id" class="form-control" required>
                    @foreach($kriterias as $kriteria)
                        <option value="{{ $kriteria->id }}" {{ $gejala->kriteria_id == $kriteria->id ? 'selected' : '' }}>
                            {{ $kriteria->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kriteria_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="penyakit_id">Penyakit Terkait:</label>
                <select name="penyakit_id" id="penyakit_id" class="form-control" required>
                    @foreach($penyakits as $penyakit)
                        <option value="{{ $penyakit->id }}"
                            {{ optional($gejala->pengetahuan)->penyakit_id == $penyakit->id ? 'selected' : '' }}>
                            {{ $penyakit->nama }}
                        </option>
                    @endforeach
                </select>
                @error('penyakit_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="nama_gejala">Nama Gejala:</label>
                <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" value="{{ $gejala->nama }}" required>
                @error('nama_gejala') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="bobot">Bobot (nilai AHP):</label>
                <input type="number" step="0.01" min="0" max="1" name="bobot" id="bobot" class="form-control"
                       value="{{ optional($gejala->pengetahuan)->nilai ?? '' }}">
                @error('bobot') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('ahli.gejala.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</div>
@endsection
