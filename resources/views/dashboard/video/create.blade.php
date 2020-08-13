@section('title')
    {{ config('app.name') }} | Add Video
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Add Video</h1>
        <hr>
        @include('includes.flash')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Add video title.">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="custom-select">
                            @foreach($videocategories as $videocategory)
                                <option value="{{ $videocategory->id }}">{{ $videocategory->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Video Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Add a description for the video."></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="city_name">City Name</label>
                                <input type="text" id="city_name" name="city_name" class="form-control" placeholder="Enter your city name">
                            </div>
                            <div class="col-6">
                                <label for="zone_name">Zone Name</label>
                                <input type="text" id="zone_name" name="zone_name" class="form-control" placeholder="Enter your zone name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="teacher_or_parent_name">Teacher/Parent Name</label>
                        <input type="text" class="form-control" id="teacher_or_parent_name" name="teacher_or_parent_name" placeholder="Add your teacher or parent name.">
                    </div>
                    <div class="form-group">
                        <label for="youtube_link">YouTube Link</label>
                        <input type="text" class="form-control" id="youtube_link" name="youtube_link" placeholder="Enter YouTube video link instead of uploading (optional)">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="video">Upload Video</label>
                            <input type="file" accept="video/*" name="video" id="video" class="custom-file-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-warning">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
