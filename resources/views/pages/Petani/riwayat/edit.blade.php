@extends('layouts.Petani.app')

@section('title', 'Edit Riwayat Gejala')

@section('Petani_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Riwayat Gejala</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('riwayat.update', $riwayat->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                               value="{{ $riwayat->tanggal }}">
                    </div>

                    @foreach ($kriterias as $kriteria)
                        <div class="form-group mt-3">
                            <label>{{ $kriteria->nama }}</label><br>

                            @php
                                // Mapping kode ke nama kolom di tabel riwayat
                                $kodeMap = [
                                    'K1' => 'warna_daun',
                                    'K2' => 'bentuk_bercak',
                                    'K3' => 'bagian_terinfeksi',
                                    'K4' => 'kondisi_lingkungan',
                                ];

                                $kolom = $kodeMap[$kriteria->kode] ?? null;
                                $selectedGejala = $riwayat->{$kolom} ?? [];

                                if (!is_array($selectedGejala)) {
                                    $selectedGejala = json_decode($selectedGejala, true) ?? [];
                                }

                                // Ambil semua nama gejala pilihan
                                $namaPilihan = $kriteria->gejalaPilihan->pluck('nama')->toArray();

                                // Filter nilai "lainnya" (yang tidak ada dalam pilihan)
                                $lainnya = collect($selectedGejala)->filter(function($item) use ($namaPilihan) {
                                    return !in_array($item, $namaPilihan);
                                })->values();
                            @endphp


                            @foreach ($kriteria->gejalaPilihan as $gejala)
                                <div class="form-check">
                                <input class="form-check-input"
                                    type="checkbox"
                                    name="{{ $kriteria->kode }}[]"
                                    value="{{ $gejala->nama }}"
                                    {{ in_array(trim($gejala->nama), $selectedGejala) ? 'checked' : '' }}>

                                    <label class="form-check-label">{{ $gejala->nama }}</label>
                                </div>
                            @endforeach

                            <input type="text" name="{{ $kriteria->kode }}[]" class="form-control mt-2"
                                   placeholder="Lainnya..." value="{{ $lainnya->first() }}">
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-success mt-3">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
