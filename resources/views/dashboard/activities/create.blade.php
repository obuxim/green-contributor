@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Add Activity
            <a href="{{ route('activities.index') }}"><i class="fas fa-list fa-2x text-dark"></i></a>
        </div>
        <div class="card-body">
            @include('partials.flash')
            <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Add activity title.">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="custom-select">
                        <option value="cuisine">Cuisine</option>
                        <option value="culture">Culture</option>
                        <option value="environmental-activities">Environmental Activities</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Activity Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Add a description for the activity."></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="col-4">
                            <label for="city_id">City</label>
                            <select name="city_id" id="city_id" class="custom-select">
                                @foreach($cities as $key => $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="zone_name">Zone Name</label>
                            <input type="text" id="zone_name" name="zone_name" class="form-control" placeholder="Enter your zone name">
                        </div>
                        <div class="col-4">
                            <label for="point">Point</label>
                            <input type="number" id="point" name="point" class="form-control" min="0000" max="9999">
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
                        <label class="custom-file-label" for="video">Upload Activity Attachment</label>
                        <input type="file" accept="video/*,image/*" name="media" id="media" class="custom-file-input">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
