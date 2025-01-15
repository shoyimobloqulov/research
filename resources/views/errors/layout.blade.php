@extends('layouts.admin')
@section('content')
    <div class="card-body z-index-1">
        <div class="row align-items-center justify-content-center text-center text-white h-100">
            <div class="col-auto">
                <h1 class="fw-bold" style="font-size: 100px;">
                    @yield('code')
                </h1>
                <h1>
                    Something went <b>WRONG</b>!
                </h1>
                <p>
                    {{ $exception->getMessage() }}
                </p>
                <br>
                <p>
                    @yield('message')
                </p>
                <br>
                <a
                    href="/" class="btn btn-light">
                    Back to home <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
