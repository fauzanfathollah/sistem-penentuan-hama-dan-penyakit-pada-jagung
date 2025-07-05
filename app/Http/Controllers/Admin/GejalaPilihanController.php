<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GejalaPilihan;
use App\Models\Kriteria;


class GejalaPilihanController extends Controller
{
    public function index()
    {
        $data = GejalaPilihan::with('kriteria')->get();
        return view('pages.admin.gejalaPilihan.index', compact('data'));
    }


    public function create()
    {
        $kriterias = Kriteria::all();
        return view('pages.admin.gejalaPilihan.create', compact('kriterias'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama' => 'required',
        ]);

        GejalaPilihan::create($request->all());

        return redirect()->route('admin.gejalaPilihan.index')->with('success', 'Pilihan gejala berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $gejalaPilihan = GejalaPilihan::findOrFail($id);
        $kriterias = Kriteria::all();
        return view('pages.admin.gejalaPilihan.edit', compact('gejalaPilihan', 'kriterias'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kriteria_id' => 'required',
            'nama' => 'required',
        ]);

        $GejalaPilihan = GejalaPilihan::findOrFail($id);
        $GejalaPilihan->update($request->all());

        return redirect()->route('admin.gejalaPilihan.index')->with('success', 'Pilihan gejala berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $GejalaPilihan = GejalaPilihan::findOrFail($id);
        $GejalaPilihan->delete();

        return redirect()->route('admin.gejalaPilihan.index')->with('success', 'Pilihan gejala berhasil dihapus.');
    }
}
