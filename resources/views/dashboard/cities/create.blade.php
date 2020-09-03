@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Add City
            <a href="{{ route('cities.index') }}"><i class="fas fa-list fa-2x text-dark"></i></a>
        </div>
        <div class="card-body">
            @include('partials.flash')
            <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the city name...">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Enter the city description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="landscape">Cover Image/Landscape</label>
                    <input type="file" class="form-control-file" id="landscape" name="landscape" placeholder="Upload a landscape...">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
