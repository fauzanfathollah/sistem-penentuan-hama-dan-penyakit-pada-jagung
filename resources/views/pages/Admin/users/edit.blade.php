@extends('layouts.Admin.app')

@section('title', 'edit')

@section('Admin_main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pengguna</h1>
        </div>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
            <option value="Petani" {{ $user->role == 'Petani' ? 'selected' : '' }}>Petani</option>
            <option value="Ahli" {{ $user->role == 'Ahli' ? 'selected' : '' }}>Ahli</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>


</div>
@endsection
