@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Self-study</h1>
        <div class="row">
            @for ($i = 1; $i <= 20; $i++)
                <div class="col-md-3 mb-4">
                    <div class="card  border-theme-1 theme-green mb-3">
                        <div class="card-header bg-theme-1-subtle">
                            <div class="row gx-3 align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 bg-theme-1-subtle text-theme-1 rounded">
                                        <i class="bi bi-book-half h5"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="{{ route('study.show',$i) }}" class="style-none">
                                        <h6 class="mb-0">{{ $i }}. Self-study</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body z-index-1">
                            <div class="row gx-3 align-items-center">
                                <div class="col">
                                    <p class="text-secondary small">Click to view</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('study.show',$i) }}" class="btn btn-square btn-link">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
