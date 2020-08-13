@section('title')
    {{ config('app.name') }} | Videos
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">List Videos</h1>
        <hr>
        @include('dashboard.flash')
        @if(count($videos) == 0)
            <div class="card">
                <div class="card-header">No Videos Found</div>
            </div>
        @else
            @foreach($videos as $video)
            <div class="card mb-3">
                <div class="card-header">
                    <a class="btn btn-warning" href="{{ route('dashboard.videos.edit', $video->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('dashboard.videos.destroy', $video->id) }}">Delete</a>
                </div>
                <div class="card-body">
                    <h2>{{ $video->title }}</h2>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection
