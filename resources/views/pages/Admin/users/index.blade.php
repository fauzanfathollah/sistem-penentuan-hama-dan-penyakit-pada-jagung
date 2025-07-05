@extends('layouts.Admin.app')

@section('title', 'dashboard')

@section('Admin_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelola Data pengguna</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">+ Tambah Pengguna</a>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $pengguna)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pengguna->name }}</td>
                            <td>{{ $pengguna->username }}</td>
                            <td>{{ ucfirst($pengguna->role) }}</td>
                            <td>
                                <div class="d-flex" style="gap: 0.5rem;">
                                    <a href="{{ route('admin.users.edit', $pengguna->id) }}" class="btn btn-primary btn-sm d-flex align-items-center">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $pengguna->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data pengguna.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries (bisa dikosongkan kalau tidak pakai grafik dsb) -->
@endpush
