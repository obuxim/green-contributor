@section('title')
    {{ config('app.name') }} | Edit Video Category
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Edit Video Category</h1>
        <hr>
        @include('includes.flash')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.videocategories.update', $videocategory->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input value="{{ $videocategory->title }}" type="text" class="form-control" name="title" id="title" placeholder="Enter a title for your video category">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-warning">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
