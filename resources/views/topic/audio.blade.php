@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Topic Audio</h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <audio controls>
                                <source src="{{ route('audio.stream', $id.".m4a") }}" type="audio/mp4">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
