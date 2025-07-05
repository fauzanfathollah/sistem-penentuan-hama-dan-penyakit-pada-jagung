@extends('layouts.Ahli.app')

@section('title', 'Tambah Gejala')

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Gejala</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('ahli.gejala.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="kriteria_id">Kriteria:</label>
                        <select name="kriteria_id" id="kriteria_id" class="form-control" required>
                            <option value="">-- Pilih Kriteria --</option>
                            @foreach($kriterias as $kriteria)
                                <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                            @endforeach
                        </select>
                        @error('kriteria_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="penyakit_id">Penyakit Terkait:</label>
                        <select name="penyakit_id" id="penyakit_id" class="form-control" required>
                            <option value="">-- Pilih Penyakit --</option>
                            @foreach($penyakits as $penyakit)
                                <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                            @endforeach
                        </select>
                        @error('penyakit_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="nama_gejala">Nama Gejala:</label>
                        <input type="text" name="nama_gejala" class="form-control" placeholder="Contoh: Daun bercak kuning" required>
                        @error('nama_gejala') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="bobot">Nilai Bobot:</label>
                        <input type="number" name="bobot" class="form-control" step="0.01" min="0" max="1" placeholder="Contoh: 0.85" required>
                        @error('bobot') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    <a href="{{ route('ahli.gejala.index') }}" class="btn btn-secondary mt-4">Batal</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
