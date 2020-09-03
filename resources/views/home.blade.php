@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Dashboard
        </div>
        <div class="card-body">
            Welcome to {{Auth::user()->type}} dashboard
        </div>
    </div>
@endsection
