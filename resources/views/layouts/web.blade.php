<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<header class="bg-primary text-dark">
    <nav class="d-flex container justify-content-between align-items-center my-3">
        <a href="{{ config('app.url') }}" class="navbar-brand text-dark">{{ config('app.name', 'Green Contributor') }}</a>
        <div class="d-flex align-items-center justify-content-around">
            <a href="/" class="mx-2 text-dark text-capitalize">home</a>
            <a href="/" class="mx-2 text-dark text-capitalize">explore</a>
            <a href="/" class="mx-2 text-dark text-capitalize">videos</a>
            <a href="/" class="mx-2 text-dark text-capitalize">events</a>
            <a href="/" class="mx-2 text-dark text-capitalize">shop</a>
            <a href="/" class="mx-2 text-dark text-capitalize">about</a>
            <a href="/" class="mx-2 text-dark text-capitalize">contact</a>
            <a href="/" class="mx-2 text-dark text-capitalize">login</a>
        </div>
    </nav>
</header>
</body>
</html>
