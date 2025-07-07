<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('pages.ahli.penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('pages.ahli.penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:penyakits,kode',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'bobot' => 'required|numeric',
        ]);

        try {
            Penyakit::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'bobot' => $request->bobot,
            ]);

            return redirect()->route('ahli.penyakit.index')->with('success', 'Penyakit berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Penyakit gagal ditambahkan: ' . $e->getMessage());
        }
    }


    public function edit(Penyakit $penyakit)
    {
        return view('pages.ahli.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:penyakits,kode,' . $penyakit->id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'bobot' => 'required|numeric',
        ]);

        $penyakit->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('ahli.penyakit.index')->with('success', 'Penyakit berhasil diperbarui');
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return redirect()->route('ahli.penyakit.index')->with('success', 'Penyakit berhasil dihapus');
    }
}
