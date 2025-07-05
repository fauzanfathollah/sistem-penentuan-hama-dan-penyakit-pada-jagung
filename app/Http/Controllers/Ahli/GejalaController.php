<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GejalaPilihan;
use App\Models\Kriteria;
use App\Models\Penyakit;
use App\Models\Pengetahuan;

class GejalaController extends Controller
{
    public function index()
    {
        $data = GejalaPilihan::with(['kriteria', 'pengetahuan.penyakit'])->get();
        return view('pages.ahli.gejala.index', compact('data'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        $penyakits = Penyakit::all();
        return view('pages.ahli.gejala.create', compact('kriterias', 'penyakits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'penyakit_id' => 'required|exists:penyakits,id',
            'nama_gejala' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:1',
        ]);

        // Simpan gejala
        $gejala = GejalaPilihan::create([
            'kriteria_id' => $validated['kriteria_id'],
            'nama' => $validated['nama_gejala'],
        ]);

        // Simpan pengetahuan terkait
        Pengetahuan::create([
            'kriteria_id' => $validated['kriteria_id'],
            'penyakit_id' => $validated['penyakit_id'],
            'gejala' => $validated['nama_gejala'],
            'nilai' => $validated['bobot'],
            'gejala_pilihan_id' => $gejala->id,
        ]);

        return redirect()->route('ahli.gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gejala = GejalaPilihan::with('pengetahuan')->findOrFail($id);
        $kriterias = Kriteria::all();
        $penyakits = Penyakit::all();

        return view('pages.ahli.gejala.edit', compact('gejala', 'kriterias', 'penyakits'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'penyakit_id' => 'required|exists:penyakits,id',
            'nama_gejala' => 'required|string|max:255',
            'bobot' => 'nullable|numeric|min:0|max:1',
        ]);

        // Update gejala pilihan
        $item = GejalaPilihan::findOrFail($id);
        $item->update([
            'kriteria_id' => $validated['kriteria_id'],
            'nama' => $validated['nama_gejala'],
        ]);

        // Update pengetahuan jika ada
        $pengetahuan = Pengetahuan::where('gejala_pilihan_id', $item->id)->first();

        if ($pengetahuan) {
            $pengetahuan->update([
                'kriteria_id' => $validated['kriteria_id'],
                'penyakit_id' => $validated['penyakit_id'],
                'gejala' => $validated['nama_gejala'],
                'nilai' => $validated['bobot'] ?? $pengetahuan->nilai,
            ]);
        } else {
            // Jika tidak ditemukan (kemungkinan `NULL` dulu), buat baru
            Pengetahuan::create([
                'kriteria_id' => $validated['kriteria_id'],
                'penyakit_id' => $validated['penyakit_id'],
                'gejala' => $validated['nama_gejala'],
                'nilai' => $validated['bobot'] ?? 0,
                'gejala_pilihan_id' => $item->id,
            ]);
        }

        return redirect()->route('ahli.gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = GejalaPilihan::findOrFail($id);

        // Hapus data pengetahuan yang berhubungan
        Pengetahuan::where('gejala_pilihan_id', $item->id)->delete();

        // Hapus data gejala
        $item->delete();

        return redirect()->route('ahli.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }
}
