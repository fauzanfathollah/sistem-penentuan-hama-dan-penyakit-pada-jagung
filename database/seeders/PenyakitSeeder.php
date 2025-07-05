<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        Penyakit::insert([
            [
                'nama' => 'Penyakit Karat Daun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penyakit Hawar Daun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penyakit Busuk Batang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
