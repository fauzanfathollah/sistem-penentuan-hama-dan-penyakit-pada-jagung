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

    public function create()
    {
        return view('pages.Ahli.kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('ahli.perhitungan_ahp.index')->with('success', 'Kriteria berhasil ditambahkan.');
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
}
