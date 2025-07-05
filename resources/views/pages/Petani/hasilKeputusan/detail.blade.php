@extends('layouts.Petani.app')

@section('title', 'Detail Hasil Keputusan')

@section('Petani_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Hasil Keputusan</h1>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($keputusan)
                    <p><strong>Tanggal Diagnosa:</strong> {{ \Carbon\Carbon::parse($keputusan->tanggal)->format('d-m-Y H:i') }}</p>
                    <p><strong>Penyakit Terdeteksi:</strong> {{ $keputusan->penyakit }}</p>
                    <p><strong>Gejala yang Dialami:</strong></p>
                    <ul>
                        @foreach (json_decode($keputusan->gejala, true) ?? [] as $gejala)
                            <li>{{ $gejala }}</li>
                        @endforeach
                    </ul>
                    <p><strong>Rekomendasi / Solusi:</strong> {{ $keputusan->solusi }}</p>
                @else
                    <div class="alert alert-warning">Data hasil keputusan tidak ditemukan.</div>
                @endif

                <a href="{{ route('hasilKeputusan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection
