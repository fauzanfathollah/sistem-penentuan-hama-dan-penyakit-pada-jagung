<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Sistem</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex align-items-center justify-content-center min-vh-100">
                <div class="col-lg-4 col-md-6 col-12 bg-white p-4 rounded shadow">
                    <div class="text-center">
                        <img src="{{ asset('img/aa.svg') }}" alt="logo" width="80" class="mb-3">
                        <h4 class="text-dark font-weight-normal">Login<br><small class="text-muted">SPK Pada Tanaman Jagung</small></h4>
                    </div>

                    @if(session('failed'))
                        <div class="alert alert-danger">{{ session('failed') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login-proses') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="form-group mt-3">
                            <label for="username">Username</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror"
                                name="username" required autofocus>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-check mt-2">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember-me">
                            <label class="form-check-label" for="remember-me">Remember Me</label>
                        </div>

                        <div class="form-group text-right mt-3">
                            {{-- <a href="{{ route('password.request') }}" class="float-left">Forgot Password?</a> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>

                        <div class="text-center mt-3">
                            <span>Belum punya akun?</span>
                            <a href="{{ route('register') }}">Daftar di sini</a>
                        </div>

                    </form>

                    <div class="text-center text-small mt-5">
                        &copy; {{ date('Y') }} - Uniba Madura <br>
                        <a href="#">Privacy Policy</a> &bullet; <a href="#">Terms of Service</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
