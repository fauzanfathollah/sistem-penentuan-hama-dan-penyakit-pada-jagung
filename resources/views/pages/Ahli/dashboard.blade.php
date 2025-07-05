@extends('layouts.Ahli.app')

@section('title', 'Dashboard Ahli')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <!-- Kartu Jumlah Gejala -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Gejala yang Diinput</h4>
                        </div>
                        <div class="card-body">
                            <p>Menunggu Verifikasi: <strong>{{ $menunggu ?? 0 }}</strong></p>
                            <p>Valid: <strong>{{ $valid ?? 0 }}</strong></p>
                            <p>Tidak Valid: <strong>{{ $tidak_valid ?? 0 }}</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Hasil Keputusan -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Hasil Keputusan</h4>
                        </div>
                        <div class="card-body">
                            @if($penyakit_terbanyak)
                                <p>Penyakit yang paling sering terdeteksi: <strong>{{ $penyakit_terbanyak->nama }}</strong> ({{ $penyakit_terbanyak->persentase }}%)</p>
                            @else
                                <p>Belum ada data keputusan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
