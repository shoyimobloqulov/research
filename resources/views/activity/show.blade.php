@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ $argc->name ?? "" }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if($is_listing)
                                    <livewire:fill-in-the-blanks :listeningId="$argc->subject_id"/>

                                    @auth
                                        <livewire:line-chart :listening_id="$argc->subject_id"/>
                                    @endauth
                                @endif

                                @if($is_vocabulary)
                                    <livewire:vocabulary-match-test :subject_id="$argc->subject_id"/>
                                @else
                                    @if(!$is_vocabulary and !$is_listing)
                                        <p>{!! $argc->description ?? "" !!}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
