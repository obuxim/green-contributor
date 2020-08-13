@section('title')
    {{ config('app.name') }} | Video Categories
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">List Video Categories</h1>
        <hr>
        @include('dashboard.flash')
        @if(count($videocategories) == 0)
            <div class="card">
                <div class="card-header">No Video Category Found</div>
            </div>
        @else
            @foreach($videocategories as $videocategory)
            <div class="card mb-3">
                <div class="card-header">
                    <a class="btn btn-warning" href="{{ route('dashboard.videocategories.edit', $videocategory->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('dashboard.videocategories.destroy', $videocategory->id) }}">Delete</a>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $videocategory->title }}</p>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection
