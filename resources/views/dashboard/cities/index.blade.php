@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Cities
            <a href="{{ route('cities.create') }}"><i class="fas fa-plus fa-2x text-dark"></i></a>
        </div>
        <div class="card-body">
            @include('partials.flash')
            @if(count($cities) == 0)
                No city found!
            @else
                @foreach($cities as $key => $city)
                    <div class="card shadow">
                        <img src="{{ asset('storage/'.$city->landscape) }}" alt="{{ $city->title }}" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">{{ $city->name }}</h2>
                            <p class="card-text">{{ $city->description }}</p>
                            <p>
                                <a href="{{ route('cities.edit', $city->id) }}"><i class="fas fa-2x text-primary mx-1 fa-edit"></i></a>
                                <a href="{{ route('cities.destroy', $city->id) }}"><i class="fas fa-2x text-danger mx-1 fa-trash"></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
