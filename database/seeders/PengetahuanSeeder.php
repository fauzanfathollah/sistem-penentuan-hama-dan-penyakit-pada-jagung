<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\Kriteria;

class PengetahuanSeeder extends Seeder
{
    public function run(): void
    {
        $penyakitMap = Penyakit::pluck('id', 'nama');
        $kriteriaMap = Kriteria::pluck('id', 'kode');

        $data = [
            [
                'penyakit' => 'Penyakit Karat Daun',
                'kriteria' => 'K1',
                'gejala' => 'Daun menguning dengan garis-garis coklat',
                'nilai' => 0.7
            ],
            [
                'penyakit' => 'Penyakit Karat Daun',
                'kriteria' => 'K3',
                'gejala' => 'Daun',
                'nilai' => 0.6
            ],
            [
                'penyakit' => 'Penyakit Hawar Daun',
                'kriteria' => 'K1',
                'gejala' => 'Daun menguning',
                'nilai' => 0.95
            ],
            [
                'penyakit' => 'Penyakit Hawar Daun',
                'kriteria' => 'K3',
                'gejala' => 'Daun',
                'nilai' => 0.9
            ],
            [
                'penyakit' => 'Penyakit Busuk Batang',
                'kriteria' => 'K3',
                'gejala' => 'Batang',
                'nilai' => 0.85
            ],
            [
                'penyakit' => 'Penyakit Busuk Batang',
                'kriteria' => 'K4',
                'gejala' => 'Tanah basah dan lembab',
                'nilai' => 0.8
            ],
        ];

        foreach ($data as $row) {
            Pengetahuan::create([
                'penyakit_id' => $penyakitMap[$row['penyakit']],
                'kriteria_id' => $kriteriaMap[$row['kriteria']],
                'gejala' => $row['gejala'],
                'nilai' => $row['nilai'],
            ]);
        }
    }
}
