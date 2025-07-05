@extends('layouts.Ahli.app')

@section('title', 'Verifikasi Gejala')

@section('Ahli_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Verifikasi Gejala</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Gejala yang Menunggu Verifikasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Warna Daun</th>
                                    <th>Bentuk Bercak</th>
                                    <th>Bagian Terinfeksi</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayats as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->nama ?? '-' }}</td>
                                    <td>{{ implode(', ', $data->warna_daun) }}</td>
                                    <td>{{ implode(', ', $data->bentuk_bercak) }}</td>
                                    <td>{{ implode(', ', $data->bagian_terinfeksi) }}</td>
                                    <td>{{ implode(', ', $data->kondisi_lingkungan) }}</td>
                                    <td>
 
                                    <form action="{{ route('ahli.verifikasi.update', $data->id) }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status_verifikasi" value="Valid">
                                        <button type="submit" class="btn btn-success btn-sm">Valid</button>
                                    </form>

                                    <form action="{{ route('ahli.verifikasi.update', $data->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status_verifikasi" value="Tidak Valid">
                                        <button type="submit" class="btn btn-danger btn-sm">Tidak Valid</button>
                                    </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
