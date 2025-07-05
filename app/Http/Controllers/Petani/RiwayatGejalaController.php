<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Kriteria;

class RiwayatGejalaController extends Controller
{
    public function index()
    {
        $riwayats = Riwayat::all();

        foreach ($riwayats as $riwayat) {
            $riwayat->warna_daun = json_decode($riwayat->warna_daun ?? '[]', true);
            $riwayat->bentuk_bercak = json_decode($riwayat->bentuk_bercak ?? '[]', true);
            $riwayat->bagian_terinfeksi = json_decode($riwayat->bagian_terinfeksi ?? '[]', true);
            $riwayat->kondisi_lingkungan = json_decode($riwayat->kondisi_lingkungan ?? '[]', true);
        }

        return view('pages.petani.riwayat.index', compact('riwayats'));
    }

    public function edit($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        // Decode data JSON
        $riwayat->warna_daun = json_decode($riwayat->warna_daun ?? '[]', true);
        $riwayat->bentuk_bercak = json_decode($riwayat->bentuk_bercak ?? '[]', true);
        $riwayat->bagian_terinfeksi = json_decode($riwayat->bagian_terinfeksi ?? '[]', true);
        $riwayat->kondisi_lingkungan = json_decode($riwayat->kondisi_lingkungan ?? '[]', true);

        $kriterias = Kriteria::all();

        return view('pages.petani.riwayat.edit', compact('riwayat', 'kriterias'));
    }

    public function update(Request $request, $id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $kriterias = Kriteria::all();

        // Mapping kode ke nama kolom di tabel
        $kodeMap = [
            'K1' => 'warna_daun',
            'K2' => 'bentuk_bercak',
            'K3' => 'bagian_terinfeksi',
            'K4' => 'kondisi_lingkungan',
        ];

        $data = [
            'tanggal' => $request->tanggal,
        ];

        foreach ($kriterias as $kriteria) {
            $kode = $kriteria->kode;
            $inputGejala = $request->input($kode, []);

            // Filter nilai kosong/null
            $inputGejala = array_values(array_filter($inputGejala, fn($v) => !is_null($v) && $v !== ''));

            $kolom = $kodeMap[$kode] ?? null;

            if ($kolom) {
                $data[$kolom] = json_encode($inputGejala, JSON_UNESCAPED_UNICODE);
            }
        }

        $riwayat->update($data);

        return redirect()->route('riwayat.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('riwayat.index')->with('success', 'Data berhasil dihapus.');
    }
}
