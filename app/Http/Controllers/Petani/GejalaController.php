<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Kriteria;

class GejalaController extends Controller
{
    // Menampilkan daftar riwayat & hasil keputusan
    public function index()
    {
        $riwayats = Riwayat::all();
        $kriterias = Kriteria::with('gejalaPilihan')->get(); // ambil semua kriteria dan gejala pilihannya

        // Bobot Kriteria
        $bobotKriteria = [
            'warna_daun' => 0.50,
            'bentuk_bercak' => 0.35,
            'bagian_terinfeksi' => 0.25,
            'kondisi_lingkungan' => 0.01,
        ];

        // Contoh Alternatif Penyakit
        $alternatif = [
            'Hawar Daun' => ['warna_daun' => 3, 'bentuk_bercak' => 4, 'bagian_terinfeksi' => 3, 'kondisi_lingkungan' => 2],
            'Karat Daun' => ['warna_daun' => 2, 'bentuk_bercak' => 3, 'bagian_terinfeksi' => 2, 'kondisi_lingkungan' => 4],
            'Bulai'      => ['warna_daun' => 4, 'bentuk_bercak' => 2, 'bagian_terinfeksi' => 3, 'kondisi_lingkungan' => 1],
        ];

        // Hitung skor AHP
        $hasilAkhir = [];
        foreach ($alternatif as $nama => $nilai) {
            $total = 0;
            foreach ($nilai as $kriteria => $skor) {
                $total += $skor * ($bobotKriteria[$kriteria] ?? 0);
            }
            $hasilAkhir[$nama] = $total;
        }

        arsort($hasilAkhir); // Urutkan dari yang tertinggi

            return view('pages.Petani.gejala.index', compact('riwayats', 'hasilAkhir', 'kriterias'));    
    }

public function store(Request $request)
{
    $kodeToField = [
        'K1' => 'warna_daun',
        'K2' => 'bentuk_bercak',
        'K3' => 'bagian_terinfeksi',
        'K4' => 'kondisi_lingkungan',
    ];

    $data = [
        'tanggal' => now(),
        'status_verifikasi' => 'Menunggu',
    ];

    foreach ($kodeToField as $kode => $field) {
        $value = array_values(array_filter($request->input($kode, []), fn($v) => $v !== null && $v !== '' && $v !== 'null'));
        $data[$field] = json_encode($value);
    }

    Riwayat::create($data);

    return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
}




}
