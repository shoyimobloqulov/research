@extends('layouts.admin')
@section('content')
    <livewire:quiz :quizId="$topic->id" />
@endsection
