@extends('layouts.Ahli.app')

@section('title', 'Daftar Gejala')

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Gejala</h1>
        </div>

        <a href="{{ route('ahli.gejala.create') }}" class="btn btn-primary mb-3 "> <i class="fas fa-plus mr-1"></i>Tambah Gejala</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penyakit</th>
                    <th>Gejala</th>
                    <th>Nilai Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kriteria->nama ?? '-' }}</td>
                    <td>{{ $item->pengetahuan->penyakit->nama ?? '-' }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->pengetahuan->nilai ?? '-' }}</td>
                    <td>
                        <div class="d-flex" style="gap: 0.5rem;">
                            <a href="{{ route('ahli.gejala.edit', $item->id) }}" class="btn btn-primary btn-sm d-flex align-items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>  
                            <form action="{{ route('ahli.gejala.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                 <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection
