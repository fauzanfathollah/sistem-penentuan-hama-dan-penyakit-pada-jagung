@extends('layouts.Petani.app')

@section('title', 'Hasil Keputusan')

@section('Petani_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Keputusan Penyakit</h1>
        </div>

        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($keputusans->count())
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Gejala</th>
                                <th>Penyakit</th>
                                <th>Solusi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keputusans as $index => $keputusan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($keputusan->tanggal)->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <ul>
                                            @foreach (json_decode($keputusan->gejala, true) ?? [] as $g)
                                                <li>{{ $g }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $keputusan->penyakit }}</td>
                                    <td>{{ $keputusan->solusi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Tidak ada hasil keputusan yang tersedia.</p>
                @endif

                {{-- Tombol export jika diperlukan --}}
                {{-- <a href="{{ route('hasilKeputusan.export') }}" class="btn btn-success mt-3">Export PDF</a> --}}
            </div>
        </div>
    </section>
</div>
@endsection
