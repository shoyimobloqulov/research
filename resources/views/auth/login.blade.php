@extends('layouts.admin')

@section('content')
    <div class="row gx-3 h-100 align-items-center justify-content-center mt-md-3">
        <div class="col-12 col-sm-8 col-md-11 col-xl-11 col-xxl-10 login-box">
            <div class="text-center mb-3">
                <h1 class="mb-2">Login</h1>
            </div>
            <div class="card adminuiux-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   required autocomplete="email" autofocus
                                   placeholder="Enter email address">
                            <label for="email">Email Address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="position-relative">
                            <div class="form-floating mb-3">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password"
                                       placeholder="Enter your password">
                                <label for="password">Password</label>
                            </div>
                            <button type="button" class="btn btn-square btn-link text-theme-1 position-absolute end-0 top-0 mt-2 me-2">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row gx-3 align-items-center mb-3">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg btn-theme w-100 mb-3">Login</button>

                        <div class="text-center mb-3">
                            Don't have an account? <a href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
