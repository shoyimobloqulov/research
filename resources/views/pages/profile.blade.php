@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="view-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#view-profile" type="button" role="tab" aria-controls="view-profile"
                                        aria-selected="true">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="edit-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile"
                                        aria-selected="false">Edit Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="change-password-tab" data-bs-toggle="tab"
                                        data-bs-target="#change-password" type="button" role="tab" aria-controls="change-password"
                                        aria-selected="false">Change Password</button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="profileTabsContent">
                            <!-- Profile Information -->
                            <div class="tab-pane fade show active" id="view-profile" role="tabpanel"
                                 aria-labelledby="view-profile-tab">
                                <h5>Full Name: {{ $user->name }}</h5>
                                <p>Email: {{ $user->email }}</p>
                            </div>

                            <!-- Edit Profile Form -->
                            <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                                <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PUT')

                                <!-- Full Name -->
                                    <div class="form-floating mb-3">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name', $user->name) }}" required>
                                        <label for="name">Full Name</label>
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
                                               name="email" value="{{ old('email', $user->email) }}" required>
                                        <label for="email">Email Address</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>

                            <!-- Change Password Form -->
                            <div class="tab-pane fade" id="change-password" role="tabpanel"
                                 aria-labelledby="change-password-tab">
                                <form method="POST" action="{{ route('profile.change_password') }}">
                                @csrf
                                @method('PUT')

                                <!-- Current Password -->
                                    <div class="form-floating mb-3">
                                        <input id="current_password" type="password"
                                               class="form-control @error('current_password') is-invalid @enderror"
                                               name="current_password" required>
                                        <label for="current_password">Current Password</label>
                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-floating mb-3">
                                        <input id="new_password" type="password"
                                               class="form-control @error('new_password') is-invalid @enderror"
                                               name="new_password" required>
                                        <label for="new_password">New Password</label>
                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div class="form-floating mb-3">
                                        <input id="new_password_confirmation" type="password" class="form-control"
                                               name="new_password_confirmation" required>
                                        <label for="new_password_confirmation">Confirm New Password</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
