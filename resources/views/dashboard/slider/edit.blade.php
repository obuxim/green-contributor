@section('title')
    {{ config('app.name') }} | Edit Slider
@endsection
@extends('dashboard.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Edit Slider</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.sliders.update', $slider->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="image">Upload Slider Image</label>
                            <input type="file" required name="image" id="image" class="custom-file-input">
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
