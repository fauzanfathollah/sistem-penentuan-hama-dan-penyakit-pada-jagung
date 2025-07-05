@extends('layouts.Admin.app')

@section('title', 'dashboard')

@section('Admin_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Admin</h1>
        </div>

    <div class="section-body">
        <div class="row">

            <!-- Jumlah Pengguna -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Pengguna</h4>
                        </div>
                        <div class="card-body">
                            Admin: {{ $AdminCount }}<br>
                            Petani: {{ $PetaniCount }}<br>
                            Ahli: {{ $AhliCount }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Gejala -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Gejala yang Diinput</h4>
                        </div>
                        <div class="card-body">
                            Menunggu Verifikasi: {{ $menungguVerifikasi }}<br>
                            Valid: {{ $valid }}<br>
                            Tidak Valid: {{ $tidakValid }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Laporan Keputusan -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <div class="card">
                        <div class="card-header"><h4>Laporan Hasil Keputusan</h4></div>
                        <div class="card-body">
                            @if($penyakitTerbanyak)
                                Penyakit yang paling sering terdeteksi: <br>
                                <strong>{{ $penyakitTerbanyak->penyakit }}</strong>
                                ({{ $penyakitTerbanyak->total }} kasus)
                            @else
                                Belum ada data hasil keputusan.
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
