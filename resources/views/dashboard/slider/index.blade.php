@section('title')
    {{ config('app.name') }} | Sliders
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">List Sliders</h1>
        <hr>
        @include('includes.flash')
        @if(count($sliders) == 0)
            <div class="card">
                <div class="card-header">No Sliders Found</div>
            </div>
        @else
            @foreach($sliders as $slider)
            <div class="card mb-3">
                <div class="card-header">
                    <a class="btn btn-warning" href="{{ route('dashboard.sliders.edit', $slider->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('dashboard.sliders.destroy', $slider->id) }}">Delete</a>
                </div>
                <div class="card-body">
                    <img class="card-img" src="{{ config('app.url').$slider->link }}">
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection
