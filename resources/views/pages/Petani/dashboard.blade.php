@extends('layouts.Petani.app')

@section('title', 'Dashboard Petani')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('Petani_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Gejala Dikirim</h4></div>
                        <div class="card-body">{{ $totalGejala }}</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success text-white">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Valid</h4></div>
                        <div class="card-body">{{ $totalValid }}</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning text-white">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Menunggu</h4></div>
                        <div class="card-body">{{ $totalMenunggu }}</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger text-white">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Tidak Valid</h4></div>
                        <div class="card-body">{{ $totalTidakValid }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hasil Keputusan (Dinamis dari tabel hasil_keputusans) --}}
        @if($hasilTerbaru)
        <div class="card">
            <div class="card-body">
                <h5>Hasil Keputusan</h5>
                <p><strong>Tanggal:</strong> {{ $hasilTerbaru->tanggal }}</p>
                <p><strong>Penyakit Terdeteksi:</strong> {{ $hasilTerbaru->penyakit }}</p>
                <p><strong>Rekomendasi:</strong> {{ $hasilTerbaru->solusi }}</p>           
                {{-- Ganti route ini jika belum ada --}}
                <a href="{{ route('hasilKeputusan.index') }}" class="btn btn-primary">Lihat Detail Hasil</a>

            </div>
        </div>
        @endif

    </section>
</div>
@endsection
