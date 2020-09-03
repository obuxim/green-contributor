@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Add Event
            <a href="{{ route('events.index') }}"><i class="fas fa-list fa-2x text-dark"></i></a>
        </div>
        <div class="card-body">
            @include('partials.flash')
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter the event title...">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Enter the event description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="time">Event date-time</label>
                    <div class="input-group date" id="time" data-target-input="nearest">
                        <input type="text" name="time" class="form-control datetimepicker-input" data-target="#time"/>
                        <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="zoom_link">Zoom Link</label>
                    <input type="text" class="form-control" id="zoom_link" name="zoom_link" value="{{ old('zoom_link') }}" placeholder="Enter the event streaming link...">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" id="city" class="custom-select">
                        @foreach($cities as $key => $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" placeholder="Enter the country name...">
                </div>
                <div class="form-group">
                    <label for="crowdfund_link">Crowdfund Link</label>
                    <input type="text" class="form-control" id="crowdfund_link" name="crowdfund_link" value="{{ old('crowdfund_link') }}" placeholder="Enter the event crowdfunding link...">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
