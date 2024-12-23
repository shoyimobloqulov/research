@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row gx-3">
            @foreach ($topics as $topic)
                <div class="col-12 col-md-6 col-lg-4 col-xl-6 col-xxl-3">
                    <div class="card  border-theme-1 theme-green mb-3">
                        <div class="card-header bg-theme-1-subtle">
                            <div class="row gx-3 align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 bg-theme-1-subtle text-theme-1 rounded">
                                        <i class="bi bi-house h5"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="{{ route('topic.details', ['id' => $topic['id']]) }}" class="style-none">
                                        <h6 class="mb-0">Topic - {{ $topic['id'] }}</h6>
                                    </a>
                                    <p class="text-secondary small">{{ $topic['title'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body z-index-1">
                            <div class="row gx-3 align-items-center">
                                <div class="col">
                                    <p class="text-secondary small">Click to view</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('topic.details', ['id' => $topic['id']]) }}" class="btn btn-square btn-link">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
