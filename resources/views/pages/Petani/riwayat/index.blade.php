@extends('layouts.Petani.app') 

@section('title', 'Riwayat Gejala')

@section('Petani_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Gejala</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- <div class="row mb-3">
            <div class="col-md-4">
                <form method="GET" action="{{ route('gejala.index') }}">
                    <div class="input-group">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Filter Status --</option>
                            <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Valid" {{ request('status') == 'Valid' ? 'selected' : '' }}>Valid</option>
                            <option value="Tidak Valid" {{ request('status') == 'Tidak Valid' ? 'selected' : '' }}>Tidak Valid</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th> <!-- Tanggal input -->
                                    <th>Warna Daun</th>
                                    <th>Bentuk Bercak</th>
                                    <th>Bagian Terinfeksi</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Status Verifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($riwayats as $index => $riwayat)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d-m-Y') }}</td>

                                        <td>
                                            @foreach ((array) $riwayat->warna_daun as $item)
                                                @if($item)
                                                    <div>{{ $item }}</div>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ((array) $riwayat->bentuk_bercak as $item)
                                                @if($item)
                                                    <div>{{ $item }}</div>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ((array) $riwayat->bagian_terinfeksi as $item)
                                                @if($item)
                                                    <div>{{ $item }}</div>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ((array) $riwayat->kondisi_lingkungan as $item)
                                                @if($item)
                                                    <div>{{ $item }}</div>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @php
                                                $status = strtolower($riwayat->status_verifikasi);
                                            @endphp
                                            @if ($status == 'valid')
                                                <span class="badge badge-success">Valid</span>
                                            @elseif ($status == 'tidak valid')
                                                <span class="badge badge-danger">Tidak Valid</span>
                                            @else
                                                <span class="badge badge-warning">Menunggu</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex" style="gap: 0.5rem;">
                                                <a href="{{ route('riwayat.edit', $riwayat->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Belum ada riwayat gejala.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
