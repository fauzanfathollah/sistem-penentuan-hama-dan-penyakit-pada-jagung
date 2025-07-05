<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Kriteria;
use App\Models\Penyakit;
use Illuminate\Support\Facades\DB;

class PerhitunganAhpController extends Controller
{
    public function index()
    {
        $riwayats = Riwayat::where('status_verifikasi', 'valid')->latest()->get();
        return view('pages.ahli.Perhitungan_Ahp.index', compact('riwayats'));
    }

    public function list($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $kriterias = Kriteria::all();
        $penyakits = Penyakit::all();

        $hasil_akhir = [];
        $hasilKriteria = [];

        // Mapping kolom ke field riwayat
        $mapping = [
            'Warna Daun' => 'warna_daun',
            'Bentuk Bercak' => 'bentuk_bercak',
            'Bagian Terinfeksi' => 'bagian_terinfeksi',
            'Kondisi Lingkungan' => 'kondisi_lingkungan',
        ];

        // Proses kriteria & gejala yang dipilih
        foreach ($kriterias as $index => $kriteria) {
            $kolom = $mapping[$kriteria->nama] ?? null;
            $raw = $kolom ? $riwayat[$kolom] : null;

            try {
                $decoded = json_decode($raw, true);
                if (is_string($decoded)) $decoded = json_decode($decoded, true);
                $inputGejala = is_array($decoded) ? $decoded : [$decoded];
            } catch (\Exception $e) {
                $inputGejala = [];
            }

            $hasilKriteria[] = [
                'kriteria' => $kriteria->nama,
                'bobot' => $kriteria->bobot,
                'gejala' => $inputGejala,
            ];
        }

        // Proses perhitungan skor tiap penyakit
        foreach ($penyakits as $penyakit) {
            $skor = 0;

            foreach ($kriterias as $kriteria) {
                $kolom = $mapping[$kriteria->nama] ?? null;
                $raw = $kolom ? $riwayat[$kolom] : null;

                try {
                    $decoded = json_decode($raw, true);
                    if (is_string($decoded)) $decoded = json_decode($decoded, true);
                    $inputGejala = is_array($decoded) ? $decoded : [$decoded];
                } catch (\Exception $e) {
                    $inputGejala = [];
                }

                if (empty($inputGejala)) continue;

                $relasi = DB::table('pengetahuans')
                    ->where('penyakit_id', $penyakit->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->get();

                foreach ($relasi as $r) {
                    foreach ($inputGejala as $gejalaInput) {
                            $input = strtolower(trim($gejalaInput));
                            $target = strtolower(trim($r->gejala));
                            $persen = 0;
                            similar_text($input, $target, $persen);

                            if ($persen >= 80) { // misalnya ambil jika mirip ≥ 80%
                                $skor += $kriteria->bobot * $r->nilai;
                                break;
                        }
                    }
                }
            }

            $hasil_akhir[] = [
                'penyakit' => $penyakit->nama,
                'skor' => $skor,
            ];
        }

        // Urutkan berdasarkan skor tertinggi
        usort($hasil_akhir, fn($a, $b) => $b['skor'] <=> $a['skor']);

        // Kirim data ke view
        return view('pages.ahli.Perhitungan_Ahp.hasil', [
            'hasilKriteria' => $hasilKriteria,
            'hasil_akhir' => $hasil_akhir,
        ]);
    }

    public function show($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $kriterias = Kriteria::all();

        $mapping = [
            'Warna Daun' => 'warna_daun',
            'Bentuk Bercak' => 'bentuk_bercak',
            'Bagian Terinfeksi' => 'bagian_terinfeksi',
            'Kondisi Lingkungan' => 'kondisi_lingkungan',
        ];

        $gejalaTerpilih = [];
        foreach ($mapping as $namaKriteria => $kolom) {
            $decoded = json_decode($riwayat->$kolom, true);
            $gejalaTerpilih[$namaKriteria] = is_array($decoded) ? $decoded : [$decoded];
        }

        return view('pages.ahli.perhitungan_ahp.hasil', compact('riwayat', 'kriterias', 'gejalaTerpilih'));
    }

    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('ahli.perhitungan_ahp.index')->with('success', 'Riwayat berhasil dihapus.');
    }

}
