<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\HasilKeputusan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

        public function dashboar()
        {
            return view('pages.Ahli.dashboard');
        }
    

    public function index()
    {
        // Hitung jumlah status verifikasi
        $menunggu = Gejala::where('status_verifikasi', 'Menunggu')->count();
        $valid = Gejala::where('status_verifikasi', 'Valid')->count();
        $tidak_valid = Gejala::where('status_verifikasi', 'Tidak Valid')->count();

        // Ambil penyakit yang paling sering muncul dari hasil keputusan
        $penyakit_terbanyak = HasilKeputusan::select('penyakit', DB::raw('count(*) as jumlah'))
            ->groupBy('penyakit')
            ->orderByDesc('jumlah')
            ->first();

        $total = HasilKeputusan::count();

        if ($penyakit_terbanyak && $total > 0) {
            $penyakit_terbanyak->nama = $penyakit_terbanyak->penyakit;
            $penyakit_terbanyak->persentase = round(($penyakit_terbanyak->jumlah / $total) * 100);
        }

        return view('pages.Ahli.dashboard', compact(
            'menunggu', 'valid', 'tidak_valid', 'penyakit_terbanyak'
        ));
    }
}
