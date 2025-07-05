@extends('layouts.Admin.app')

@section('title', 'create')

@section('Admin_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pengguna</h1>
        </div>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role">Peran</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Peran --</option>
                <option value="Petani">Petani</option>
                <option value="Ahli">Ahli</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
