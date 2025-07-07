<?php

namespace App\Http\Controllers;

use App\Models\SubKriteriaHama;
use Illuminate\Http\Request;

class SubKriteriaHamaController extends Controller
{
    public function index()
    {
        $subKriterias = SubKriteriaHama::all();
        return view('pages.ahli.subkriteriahama.index', compact('subKriterias'));
    }

    public function create()
    {
        return view('pages.ahli.subkriteriahama.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
        ]);

        SubKriteriaHama::create($request->all());
        return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subKriteria = SubKriteriaHama::findOrFail($id);
        return view('pages.ahli.subkriteriahama.edit', compact('subKriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
        ]);

        $subKriteria = SubKriteriaHama::findOrFail($id);
        $subKriteria->update($request->all());

        return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subKriteria = SubKriteriaHama::findOrFail($id);
        $subKriteria->delete();

        return redirect()->back()->with('success', 'Sub Kriteria berhasil dihapus.');
    }
}
