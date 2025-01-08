@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row gx-3">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="row gx-3">
                    <!-- Mavzu haqida -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body z-index-1">
                                <div class="avatar avatar-50 bg-success-subtle text-success rounded mb-2">
                                    <i class="bi bi-info-square"></i>
                                </div>

                                <h5 class="fw-medium mb-0">{{ $topic['title'] }}</h5>
                                <a class="text-secondary small" href="{{ route('topic.about',$topic['id']) }}">
                                    To view the details of the topic
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body z-index-1">
                                <div class="avatar avatar-50 bg-secondary-subtle text-secondary rounded mb-2">
                                    <i class="bi bi-camera-video-fill"></i>
                                </div>

                                <h5 class="fw-medium mb-0">Topic video</h5>
                                <a class="text-secondary small" href="{{ route('topic.audio',$topic['id']) }}">
                                    Click to watch the topic video.
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Mavzu Testi -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body z-index-1">
                                <div class="avatar avatar-50 bg-warning-subtle text-warning rounded mb-2">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <h5 class="fw-medium mb-0">Topic Test</h5>
                                <a class="text-secondary small" href="{{ route('topic.test',$topic['id']) }}"> Solve the test</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
