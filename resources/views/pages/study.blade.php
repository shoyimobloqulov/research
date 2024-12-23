@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Articles for Self-study</h1>
        <div class="row">
            @for ($i = 1; $i <= 20; $i++)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">Article {{ $i }}</h5>
                            <p class="card-text">This is a brief description of Article {{ $i }}. Learn more by downloading the PDF.</p>
                            <div class="text-center mt-auto">
                                <a href="{{ route('study.show',$i) }}" class="btn btn-primary">
                                    <i class="bi bi-view-stacked"></i> View
                                </a>
                                <a href="{{ url('/article/' . $i . '.pdf') }}" class="btn btn-primary" download="{{ $i."-article.pdf" }}">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
