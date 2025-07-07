@extends('layouts.Ahli.app')

@section('title', 'Manajemen Kriteria')

@section('Ahli_main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kriteria Hama</h1>
            </div>

            <div class="section-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus mr-1"></i>Tambah
                    Kriteria</a>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kriterias as $kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kriteria->nama }}</td>
                                        <td>{{ number_format($kriteria->bobot, 2) }}</td>
                                        <td>
                                            <div class="d-flex" style="gap: 0.5rem;">
                                                <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                                    class="btn btn-primary btn-sm d-flex align-items-center">
                                                    <i class="fas fa-edit mr-1"></i> Edit
                                                </a>
                                                <a href="" class="btn btn-success btn-icon mr-2">
                                                    <i class="fas fa-eye"></i> Sub Kriteria
                                                </a>
                                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus?')"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm d-flex align-items-center">
                                                        <i class="fas fa-trash mr-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada data kriteria.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
