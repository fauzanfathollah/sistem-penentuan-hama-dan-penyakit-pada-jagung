<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah pengguna berdasarkan role 
        $AdminCount  = User::whereRaw('LOWER(role) = ?', ['Admin'])->count();
        $PetaniCount = User::whereRaw('LOWER(role) = ?', ['Petani'])->count();
        $AhliCount   = User::whereRaw('LOWER(role) = ?', ['Ahli'])->count();

        // Hitung status gejala
        $menungguVerifikasi = DB::table('riwayats')->where('status_verifikasi', 'Menunggu')->count();
        $valid              = DB::table('riwayats')->where('status_verifikasi', 'Valid')->count();
        $tidakValid         = DB::table('riwayats')->where('status_verifikasi', 'Tidak Valid')->count();

        // Hitung penyakit yang paling sering terdeteksi
        $penyakitTerbanyak = DB::table('hasil_keputusans')
            ->select('penyakit', DB::raw('COUNT(*) as total'))
            ->groupBy('penyakit')
            ->orderByDesc('total')
            ->first();

        return view('pages.admin.dashboard', compact(
            'AdminCount',
            'PetaniCount',
            'AhliCount',
            'menungguVerifikasi',
            'valid',
            'tidakValid',
            'penyakitTerbanyak'
        ));
    }
}
