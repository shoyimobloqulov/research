@extends('layouts.admin')
@section('content')
    <div class="card adminuiux-card height-dynamic position-relative overflow-hidden bg-theme-1"
         style="--h-dynamic: calc(100vh - 160px)">
        <figure class="m-0 position-absolute top-0 start-0 h-100 w-100 coverimg opacity-50"
                style="background-image: url({{ asset('assets/img/modern-ai-image/flamingo-3.jpg') }});"><img
                src="{{ asset('assets/img/modern-ai-image/flamingo-3.jpg') }}" alt="" style="display: none;"></figure>
        <div class="card-body z-index-1">
            <div class="row align-items-center justify-content-center text-center text-white h-100">
                <div class="col-auto"><h1 class="fw-bold" style="font-size: 100px;">@yield('code')</h1>
                    <h1>Something went <b>WRONG</b>!</h1>
                    <p>        @yield('message')
                    </p><br><a
                        href="/" class="btn btn-light">Back to home <i
                            class="bi bi-arrow-right"></i></a></div>
            </div>
        </div>
    </div>

@endsection
