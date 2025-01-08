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

                                <h5 class="fw-medium mb-0">{{ $id }}-Self study </h5>
                                <a class="text-secondary small" href="http://researchs.lc/topic/1/about">
                                    To view the details of the topic
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
