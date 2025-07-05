@extends('layouts.kabupaten.app')

@section('title', 'Reset Password')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('kabupaten_main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Forms Reset Password</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="">Profile</a></div>
                    <div class="breadcrumb-item">Form</div>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <form action="{{ route('proses-resetPassword-dpmd') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="old_password">Password Lama</label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                    name="old_password" value="{{ old('old_password') }}" tabindex="1" autofocus>
                                @error('old_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password">Password Baru</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password" value="{{ old('new_password') }}" tabindex="2">
                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="c_new_password">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control @error('c_new_password') is-invalid @enderror"
                                    name="c_new_password" value="{{ old('c_new_password') }}" tabindex="3">
                                @error('c_new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
