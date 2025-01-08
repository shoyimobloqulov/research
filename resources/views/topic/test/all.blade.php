@extends('layouts.admin')
@section('content')
    @auth
        <div class="card adminuiux-card mb-3">
            <div class="card-header">
                <h4 class="text-center">{{ $topic->name }}</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <a class="btn btn-primary my-1 " type="submit" href="{{ route('test.submit',$topic->id) }}"><i
                        class="bi bi-check"></i> Boshlash</a>
            </div>
        </div>
    @endauth
    @guest
        <div class="row gx-3">
            <div class="col-12 col-md-12">
                <div class="card adminuiux-card mb-3">
                    <div class="card-body">
                        <p class="text-secondary">Bu amalni bajarish uchun <a href="{{ route('register') }}">tizimga kiring</a>, agar profilingiz bo'lmasa istalgan payt
                            <a href="{{ route('register') }}">ro'yxatdan o'tishingiz</a> mumkin</p>
                        <div class="text-center">
                            <a class="btn btn-primary my-1 " type="submit" href="{{ route('login') }}"><i
                                    class="bi bi-box-arrow-in-left"></i> Kirish</a>
                            <a class="btn btn-primary my-1 " type="submit" href="{{ route('login') }}"><i
                                    class="bi bi-box-arrow-in-right"></i> Ro'yxatdan o'tish</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
