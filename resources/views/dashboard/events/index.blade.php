@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Events
            <a href="{{ route('events.create') }}"><i class="fas fa-plus fa-2x text-dark"></i></a>
        </div>
        <div class="card-body">
            @include('partials.flash')
            @if(count($events) == 0)
                No event found!
            @else
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Time</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Zoom Link</th>
                        <th>Crowdfund Link</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->time }}</td>
                            <td>{{ $event->city->name }}</td>
                            <td>{{ $event->country }}</td>
                            <td><a href="{{ $event->zoom_link }}" target="_blank">Zoom Link</a></td>
                            <td><a href="{{ $event->crowdfund_link }}" target="_blank">Crowdfund Link</a></td>
                            <td>
                                <a href="{{ route('events.edit', $event->id) }}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('events.destroy', $event->id) }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
