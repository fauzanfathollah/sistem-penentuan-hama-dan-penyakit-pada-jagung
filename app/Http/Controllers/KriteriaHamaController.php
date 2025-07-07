<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\KriteriaHama;
use Illuminate\Http\Request;

class KriteriaHamaController extends Controller
{
    public function index()
    {
        $kriterias = KriteriaHama::all();
        return view('pages.ahli.kriteriahama.index', compact('kriterias'));
    }
    public function create()
    {
        return view('pages.Ahli.kriteriahama.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama'  => 'required',
            'bobot' => 'required'
        ]);
        KriteriaHama::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria hama Behasil Ditambahkan');
    }

    public function edit($id)
    {
        $kriteria = KriteriaHama::findOrFail($id);
        return view('pages.ahli.kriteriahama.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'bobot' => 'required',
        ]);

        $kriterias = KriteriaHama::findOrFail($id);
        $kriterias->update($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria hama Behasil Ditambahkan');
    }

    public function destroy($id)
    {
        $kriteria = KriteriaHama::findOrFail($id);
        $kriteria->delete();

        return redirect()->back()->with('success', 'Kriteria berhasil dihapus.');
    }
}
