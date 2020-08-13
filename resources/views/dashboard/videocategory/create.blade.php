@section('title')
    {{ config('app.name') }} | Create Video Category
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Create Video Category</h1>
        <hr>
        @include('dashboard.flash')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.videocategories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter a title for your video category">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-warning">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
