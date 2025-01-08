@extends('layouts.admin')
@section('content')
    @auth
        <div class="card adminuiux-card mb-3">
            <div class="card-header">
                <h4 class="text-center">Start a mixed test</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <a class="btn btn-primary my-1 " type="submit" href="{{ route('test.start') }}"><i
                        class="bi bi-check"></i> Start</a>
            </div>
        </div>
    @endauth
    @guest
        <div class="row gx-3">
            <div class="col-12 col-md-12">
                <div class="card adminuiux-card mb-3">
                    <div class="card-body">
                        <p class="text-secondary">To perform this action <a href="{{ route('register') }}">log in</a>, if you don't have a profile, anytime
                            <a href="{{ route('register') }}">you register</a> possible</p>
                        <div class="text-center">
                            <a class="btn btn-primary my-1 " type="submit" href="{{ route('login') }}"><i
                                    class="bi bi-box-arrow-in-left"></i> Login</a>
                            <a class="btn btn-primary my-1 " type="submit" href="{{ route('register') }}"><i
                                    class="bi bi-box-arrow-in-right"></i> Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
