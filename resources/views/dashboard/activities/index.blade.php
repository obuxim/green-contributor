@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Activities
            @if(Auth::user()->type == 'admin' || Auth::user()->type == 'student')
                <a href="{{ route('activities.create') }}"><i class="fas fa-plus fa-2x text-dark"></i></a>
            @endif
        </div>
        <div class="card-body">
            @include('partials.flash')
            @if(count($activities) == 0)
                No activity found!
            @else
                @foreach($activities as $key => $activity)
                    <div class="card shadow mb-3">
                        <div class="embed-responsive embed-responsive-16by9 card-img-top">
                            @if($activity->isYTvideo)
                                <iframe autoplay=true controls=true class="embed-responsive-item" src="{{ $activity->youtube_link }}"></iframe>
                            @else
                                <video autoplay=true controls=true class="embed-responsive-item" src="{{ asset('storage/'.$activity->media_url) }}"></video>
                            @endif
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">{{ $activity->title }}</h2>
                            <p class="card-text">{{ $activity->description }}</p>
                            <p>
                                <a href="{{ route('activities.edit', $activity->id) }}"><i class="fas fa-2x text-primary mx-1 fa-edit"></i></a>
                                <a href="{{ route('activities.destroy', $activity->id) }}"><i class="fas fa-2x text-danger mx-1 fa-trash"></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
