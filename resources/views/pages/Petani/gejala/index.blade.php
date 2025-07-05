@extends('layouts.Petani.app')

@section('title', 'Petani')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('Petani_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Gejala</h1>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('gejala.store') }}">
                            @csrf

                            <h5>Input Gejala</h5>

                            @foreach ($kriterias as $kriteria)
                                <div class="form-group">
                                    <label>{{ $kriteria->nama }}</label><br>

                                    {{-- Checkbox pilihan --}}
                                    @foreach ($kriteria->gejalaPilihan as $gejala)
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                name="{{ $kriteria->kode }}[]"
                                                value="{{ $gejala->nama }}"
                                                id="{{ $kriteria->kode }}_{{ $loop->index }}">
                                            <label class="form-check-label" for="{{ $kriteria->kode }}_{{ $loop->index }}">
                                                {{ $gejala->nama }}
                                            </label>
                                        </div>
                                    @endforeach

                                    {{-- Input lainnya --}}
                                    <input
                                        type="text"
                                        name="{{ $kriteria->kode }}[]"
                                        class="form-control mt-2"
                                        placeholder="Lainnya (opsional)">
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endpush
