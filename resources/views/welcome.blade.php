@extends('layouts.admin')
@section('content')
    @auth
        <div class="row">
            <div class="col-md-12"><h3 class="fw-normal mb-0 text-secondary">Good day,</h3>
                <h1>{{ auth()->user()->name }}</h1></div>
        </div>
    @endauth
@endsection
