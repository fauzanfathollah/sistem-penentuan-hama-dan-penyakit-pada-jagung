<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\HasilKeputusan;
use Illuminate\Http\Request;
use App\Models\Riwayat;


class DashboardController extends Controller
{

    public function dashboardPetani()
    {

        return view('pages.Petani.dashboard');
    }

    public function index()
    {


        
        $totalGejala = \App\Models\Riwayat::count();
        $totalValid = \App\Models\Riwayat::where('status_verifikasi', 'Valid')->count();
        $totalMenunggu = \App\Models\Riwayat::where('status_verifikasi', 'Menunggu')->count();
        $totalTidakValid = \App\Models\Riwayat::where('status_verifikasi', 'Tidak Valid')->count();
    
        // Ambil hasil keputusan terbaru
        $hasilTerbaru = \App\Models\HasilKeputusan::latest()->first();
    
        return view('pages.Petani.dashboard', compact(
            'totalGejala',
            'totalValid',
            'totalMenunggu',
            'totalTidakValid',
            'hasilTerbaru'
        ));
    }
    
    
    

    public function detailHasil()
    {
        // Nanti ambil data hasil keputusan dari database
        return view('pages.hasilKeputusan.detail');
    }
    

    public function manageGejala()
    {
        return view('pages.gejala.index');
    }

    public function riwayatGejala()
    {
        return view('pages.riwayat.index');
    }

    public function hasilKeputusan()
    {
        return view('pages.hasilKeputusan.index');
    }
}
