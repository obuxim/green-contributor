<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                @if(Auth::user() && Auth::user()->type == 'admin')
                    <div class="col-2">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                Navigation
                            </div>
                            <div class="card-body">
                                <nav class="nav flex-column">
                                    <a class="nav-link active" href="/dashboard">Dashboard</a>
                                    <a class="nav-link" href="/dashboard/teachers">Teachers</a>
                                    <a class="nav-link" href="/dashboard/cities">Destinations/City</a>
                                    <a class="nav-link" href="/dashboard/events">Events</a>
                                    <a class="nav-link" href="/dashboard/activities">Activities</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user() && Auth::user()->type == 'teacher')
                    <div class="col-2">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <span class="text-uppercase">{{ Auth::user()->teacher_code }}</span>
                            </div>
                            <div class="card-body">
                                <nav class="nav flex-column">
                                    <a class="nav-link" href="/dashboard/activities">Activities</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user() && Auth::user()->type == 'student')
                    <div class="col-2">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                Navigation
                            </div>
                            <div class="card-body">
                                <nav class="nav flex-column">
                                    <a class="nav-link" href="/dashboard/activities">Activities</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                @else

                @endif
                <div class="col-10">
