@extends('layouts.Ahli.app')

@section('title', 'Hasil Keputusan AHP')

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Keputusan</h1>
        </div>

        <h5>Hasil Kriteria</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Gejala</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilKriteria as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['kriteria'] }}</td>
                        <td>{{ number_format($item['bobot'], 2, ',', '.') }}</td>
                        <td>
                            @if(is_array($item['gejala']) && count($item['gejala']) > 0)
                                <ul>
                                    @foreach ($item['gejala'] as $gejala)
                                        <li>{{ $gejala }}</li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5>Hasil Skor Penyakit (Alternatif AHP)</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penyakit</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil_akhir as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['penyakit'] }}</td>
                        <td>{{ number_format($item['skor'], 4, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(count($hasil_akhir) > 0)
            <div class="mt-3">
                <strong>Kesimpulan:</strong> 
                <span class="text-success">
                    Tanaman kemungkinan besar terkena penyakit <strong>{{ $hasil_akhir[0]['penyakit'] }}</strong> 
                    dengan skor tertinggi sebesar <strong>{{ number_format($hasil_akhir[0]['skor'], 4, ',', '.') }}</strong>.
                </span>
            </div>
        @else
            <div class="mt-3 text-danger">
                <strong>Tidak ditemukan penyakit yang cocok berdasarkan gejala yang diberikan.</strong>
            </div>
        @endif
            <a href="{{ route('ahli.perhitungan_ahp.index') }}" class="btn btn-secondary">Kembali</a>
        {{-- <a href="{{ route('ahli.hasil.exportPDF') }}" class="btn btn-success mt-3">Export PDF</a> --}}
    </section>
</div>
@endsection
