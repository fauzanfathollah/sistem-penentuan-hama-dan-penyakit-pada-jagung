<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilKeputusan;
use App\Models\Riwayat;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\Kriteria;
use PDF;

class HasilKeputusanController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $keputusans = HasilKeputusan::whereHas('riwayat', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('pages.petani.hasilKeputusan.index', compact('keputusans'));
    }

    public function hasil($riwayat_id)
    {
        $riwayat = Riwayat::findOrFail($riwayat_id);
        $kriterias = Kriteria::all()->keyBy('id');
        $pengetahuans = Pengetahuan::all();

        $inputGejala = [
            1 => json_decode($riwayat->warna_daun, true),
            2 => json_decode($riwayat->bentuk_bercak, true),
            3 => json_decode($riwayat->bagian_terinfeksi, true),
            4 => json_decode($riwayat->kondisi_lingkungan, true),
        ];

        $hasil = [];
        $hasilKriteria = [];

        foreach ($kriterias as $id => $kriteria) {
            $hasilKriteria[] = [
                'kriteria' => $kriteria->nama,
                'bobot' => $kriteria->bobot,
                'gejala' => $inputGejala[$id] ?? [],
            ];
        }

        foreach ($pengetahuans as $pengetahuan) {
            $penyakitId = $pengetahuan->penyakit_id;
            $kriteriaId = $pengetahuan->kriteria_id;
            $gejala = $pengetahuan->gejala;

            if (in_array($gejala, $inputGejala[$kriteriaId] ?? [])) {
                $nilai = $pengetahuan->nilai;
                $bobot = $kriterias[$kriteriaId]->bobot;

                if (!isset($hasil[$penyakitId])) {
                    $hasil[$penyakitId] = 0;
                }

                $hasil[$penyakitId] += $nilai * $bobot;
            }
        }

        arsort($hasil);

        $penyakits = Penyakit::whereIn('id', array_keys($hasil))->get()->keyBy('id');

        $hasil_akhir = [];
        foreach ($hasil as $penyakit_id => $skor) {
            $hasil_akhir[] = [
                'penyakit' => $penyakits[$penyakit_id]->nama ?? 'Tidak diketahui',
                'skor' => round($skor, 4)
            ];
        }

        if (count($hasil_akhir) > 0) {
            $penyakit_tertinggi = $hasil_akhir[0]['penyakit'];
            $penyakitModel = Penyakit::where('nama', $penyakit_tertinggi)->first();
            $solusi = $penyakitModel ? $penyakitModel->solusi : 'Belum tersedia';

            $existing = HasilKeputusan::where('riwayat_id', $riwayat->id)->first();
            if (!$existing) {
                HasilKeputusan::create([
                    'riwayat_id' => $riwayat->id,
                    'tanggal' => now(),
                    'gejala' => implode(', ', array_merge(...array_values($inputGejala))),
                    'penyakit' => $penyakit_tertinggi,
                    'solusi' => $solusi,
                ]);

                $riwayat->status_verifikasi = 'Valid';
                $riwayat->save();
            }
        }

        return view('pages.petani.hasil_detail', compact(
            'riwayat',
            'kriterias',
            'inputGejala',
            'hasil_akhir',
            'hasilKriteria'
        ));
    }

    public function show($id)
    {
        $keputusan = HasilKeputusan::findOrFail($id);
        return view('pages.petani.detail', compact('keputusan'));
    }
}
