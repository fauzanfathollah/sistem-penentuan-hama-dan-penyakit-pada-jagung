@extends('layouts.Ahli.app')

@section('title', 'Tambah Kriteria')

@section('Ahli_main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>create Kriteria</h1>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form action="{{route('kriteria.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria</label>
                                    <input type="text" name="nama" class="form-control"  required>
                                </div>

                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input type="number" step="0.01" name="bobot" class="form-control"  required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('ahli.kriteria.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection