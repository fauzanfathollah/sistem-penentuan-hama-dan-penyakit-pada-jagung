<?php

namespace App\Http\Controllers\Ahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('pages.ahli.kriteria.index', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
        ]);

        Kriteria::create($request->all());
        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('pages.ahli.kriteria.edit', compact('kriteria'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());

    return redirect()->route('ahli.kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->back()->with('success', 'Kriteria berhasil dihapus.');
    }

    public function insertDefaultKriteria()
{
    $kriterias = [
        ['kode' => 'K1', 'nama' => 'Warna Daun', 'bobot' => 0.25],
        ['kode' => 'K2', 'nama' => 'Bentuk Bercak', 'bobot' => 0.25],
        ['kode' => 'K3', 'nama' => 'Bagian Terinfeksi', 'bobot' => 0.25],
        ['kode' => 'K4', 'nama' => 'Kondisi Lingkungan', 'bobot' => 0.25],
    ];

    foreach ($kriterias as $kriteria) {
        Kriteria::create($kriteria);
    }

    return redirect()->route('ahli.kriteria.index')->with('success', 'Data kriteria default berhasil ditambahkan.');
}

}
