@extends('landing')

@section('body')
<div class="auth-background flex-grow-1 d-flex flex-column position-relative">
        <div class="auth-overlay"></div>

        <div class="container d-flex justify-content-center py-5 mt-5">
            <div class="glass-card mt-4">

                <div class="text-center mb-4">
                    <h2 class="fw-bold">Welcome Back</h2>
                    <p class="small opacity-75">Login to continue your adventure</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="email" class="form-control glass-input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email Address" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span class="text-danger small ms-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control glass-input @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="text-danger small ms-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label small" for="remember">
                            Remember Me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-adventure">
                        Login
                    </button>

                    <div class="text-center mt-4">
                        <span class="small opacity-75">Don't have an account?</span>
                        <a href="{{ route('register') }}" class="auth-link ms-1">Register here</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
