<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="d-flex align-items-center">
            <img src="{{ asset(env('APP_LOGO')) }}" width="100">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/about') }}">Tentang Naladwipa</a></li>
                <li class="dropdown"><a href=""><span>Program</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach ($programs as $program)
                            <li><a href="{{ url('program/' . $program->slug) }}">{{ $program->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{ url('/essay') }}">Esai</a></li>
                <li><a href="{{ url('/film') }}">Film</a></li>
            </ul>
        </nav>

        <div class="position-relative">
            <a href="{{ $information->facebook }}" target="_blank" class="mx-2"><span class="bi-facebook"></span></a>
            <a href="{{ $information->twitter }}" target="_blank" class="mx-2"><span class="bi-twitter"></span></a>
            <a href="{{ $information->instagram }}" target="_blank" class="mx-2"><span
                    class="bi-instagram"></span></a>
            <a href="{{ $information->youtube }}" target="_blank" class="mx-2"><span class="bi-youtube"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="{{ url('/essay') }}" method="GET" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" name="keyword" class="form-control">
                    <button class="submit d-none"></button>
                    <button type="button" class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div>
            <!-- End Search Form -->
        </div>
    </div>
</header>
