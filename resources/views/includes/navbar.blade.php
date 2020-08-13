<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg sticky-top mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsiveMenu" aria-controls="responsiveMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="responsiveMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="{{ config('app.url') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="">Explore</a></li>
                <li class="nav-item"><a class="nav-link" href="">Videos</a></li>
                <li class="nav-item"><a class="nav-link" href="">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="">About</a></li>
                <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
