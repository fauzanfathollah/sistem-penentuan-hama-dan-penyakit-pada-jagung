<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class VerifikasiGejalaController extends Controller
{
    public function index()
    {
        $riwayats = \App\Models\Riwayat::where('status_verifikasi', 'Menunggu')->get();

        // Dekode kolom array JSON
        foreach ($riwayats as $r) {
            $r->warna_daun = json_decode($r->warna_daun, true);
            $r->bentuk_bercak = json_decode($r->bentuk_bercak, true);
            $r->bagian_terinfeksi = json_decode($r->bagian_terinfeksi, true);
            $r->kondisi_lingkungan = json_decode($r->kondisi_lingkungan, true);
        }

        return view('pages.Ahli.verifikasi_gejala', compact('riwayats'));
    }

public function verifikasi(Request $request, $id)
{
    $request->validate([
        'status_verifikasi' => 'required|in:Valid,Tidak Valid',
    ]);

    $riwayat = \App\Models\Riwayat::findOrFail($id);
    $riwayat->status_verifikasi = $request->status_verifikasi;
    $riwayat->save();

    return redirect()->back()->with('success', 'Status verifikasi berhasil diperbarui.');
}

}

