@extends('layouts.admin')

@section('content')
    <div class="row gx-3 h-100 align-items-center justify-content-center mt-md-3">
        <div class="col-12 col-sm-8 col-md-11 col-xl-11 col-xxl-10 login-box">
            <div class="text-center mb-3">
                <h1 class="mb-2">Register</h1>
            </div>
            <div class="card adminuiux-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                        <div class="form-floating mb-3">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}"
                                   required autocomplete="name" autofocus
                                   placeholder="Enter your name">
                            <label for="name">Name</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   required autocomplete="email"
                                   placeholder="Enter email address">
                            <label for="email">Email Address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password"
                                   placeholder="Enter your password">
                            <label for="password">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password"
                                   class="form-control"
                                   name="password_confirmation" required
                                   autocomplete="new-password"
                                   placeholder="Confirm your password">
                            <label for="password-confirm">Confirm Password</label>
                        </div>

                        <!-- Submit -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
