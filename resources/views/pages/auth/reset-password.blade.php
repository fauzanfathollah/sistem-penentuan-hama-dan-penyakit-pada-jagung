{{-- <h4>Haii, Kamu ada permintaan resert password, silakan klik link dibawah ini untuk me-reset passwword kamu</h4>
<br>
<br>

<a href="{{ route('validasi-forgot-password', ['token' => $token]) }}">Klik Disini</a> --}}

@extends('layouts.auth')

@section('title', 'Forgot Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Forgot Password</h4>
        </div>

        <div class="card-body">
            <p class="text-muted">Masukan password baru kamu</p>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">
                <input type="hidden" name="email" value="{{ request()->email }}">
                <label for="password">password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" tabindex="1" autofocus>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror


                <label for="password_confirmation">password Confirmation</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password_confirmation" tabindex="1" autofocus>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror


        </div>

        <div class="form-group">
            <button type="submit" value="Update Password" class="btn btn-primary btn-lg btn-block" tabindex="2">
                Forgot Password
            </button>
        </div>
        </form>
    </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
