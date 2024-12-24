@extends('layouts.admin')
@section('content')
    @auth
        <div class="row">
            <div class="col-md-12"><h3 class="fw-normal mb-0 text-secondary">Good day,</h3>
                <h1>{{ auth()->user()->name }}</h1></div>
        </div>
    @endauth
    <div class="col-12">
        <div class="row gx-3 mb-2">
            <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl mb-3">
                <a href="#" class="card adminuiux-card style-none text-center h-100">
                    <div class="card-body"><i class="avatar avatar-40 text-theme-1 h2 bi bi-people-fill mb-3"></i>
                        <p class="text-secondary small">{{ count($users) }}</p></div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl mb-3">
                <a href="#" class="card adminuiux-card style-none text-center h-100">
                    <div class="card-body"><i class="avatar avatar-40 text-theme-1 h2 bi bi-tablet-fill mb-3"></i>
                        <p class="text-secondary small">20</p></div>
                </a>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="card">
            <div class="card-head">
                <h6 class="mx-3 my-3">Users List</h6>
            </div>
            <div class="card-body">
                <table class="table mb-0" id="dataTable">
                    <thead>
                    <tr>
                        <th class="all">#</th>
                        <th class="all">Name</th>
                        <th class="all">Email</th>
                        <th class="all">Registered At</th>
                        <th class="xs">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <p class="mb-0">{{ $user->name }}</p>
                            </td>
                            <td>
                                <p class="mb-0">{{ $user->email }}</p>
                            </td>
                            <td>
                                <p class="mb-0">{{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                            </td>
                            <td>
                                <p class="mb-0 {{ $user->last_online ? 'text-success' : 'text-danger' }}">
                                    {{ $user->last_online ? 'Active' : 'Inactive' }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
