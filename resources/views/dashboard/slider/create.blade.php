@section('title')
    {{ config('app.name') }} | Create Slider
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Create Slider</h1>
        <hr>
        @include('dashboard.flash')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="image">Upload Slider Image</label>
                            <input type="file" accept="image/*" name="image" id="image" class="custom-file-input">
                        </div>
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
