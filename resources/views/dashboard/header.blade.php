<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg sticky-top mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsiveMenu" aria-controls="responsiveMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="responsiveMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ config('app.url') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dashboardSliders" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sliders
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardSliders">
                        <a class="dropdown-item" href="{{ route('dashboard.sliders.create') }}">Add Slider</a>
                        <a class="dropdown-item" href="{{ route('dashboard.sliders.index') }}">List Sliders</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dashboardVideocategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Video Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardVideocategories">
                        <a class="dropdown-item" href="{{ route('dashboard.videocategories.create') }}">Add Video Category</a>
                        <a class="dropdown-item" href="{{ route('dashboard.videocategories.index') }}">List Video Categories</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dashboardVideos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Videos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardVideos">
                        <a class="dropdown-item" href="{{ route('dashboard.videos.create') }}">Add Video</a>
                        <a class="dropdown-item" href="{{ route('dashboard.videos.index') }}">List Videos</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
