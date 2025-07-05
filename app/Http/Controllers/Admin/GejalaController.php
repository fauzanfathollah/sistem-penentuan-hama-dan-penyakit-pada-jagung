<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('pages.admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('pages.admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'warna_daun' => 'required|string',
            'bentuk_bercak' => 'required|string',
            'bagian_terinfeksi' => 'required|string',
            'kondisi_lingkungan' => 'required|string',
            'status_verifikasi' => 'nullable|string',
        ]);

        Gejala::create([
            'tanggal' => $request->tanggal,
            'warna_daun' => $request->warna_daun,
            'bentuk_bercak' => $request->bentuk_bercak,
            'bagian_terinfeksi' => $request->bagian_terinfeksi,
            'kondisi_lingkungan' => $request->kondisi_lingkungan,
            'status_verifikasi' => $request->status_verifikasi ?? 'Menunggu', // misalnya default
        ]);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('pages.admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->only('nama'));
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Gejala::destroy($id);
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }
}
