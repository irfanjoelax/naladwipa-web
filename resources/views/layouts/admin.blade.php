<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administrator - {{ env('APP_NAME') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(env('APP_LOGO')) }}" type="image/x-icon">

    <!-- Script Mix -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    @yield('extra-style')
</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-primary fw-bold text-start" href="#">
            <img src="{{ asset(env('APP_LOGO')) }}" width="90">
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-primary btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fa-solid fa-layer-group"></i>
        </button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="ml-2">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ url('admin/profile', []) }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link {{ $activeMenu == 'dashboard' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/dashboard') }}">
                            <i class="fa-solid fa-gauge"></i>
                            <span class="ms-2">Dashboard</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'program' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/program') }}">
                            <i class="fa-solid fa-list-check"></i>
                            <span class="ms-2">Program</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'essay' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/essay') }}">
                            <i class="fa-regular fa-newspaper"></i>
                            <span class="ms-2">Essay</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'film' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/film') }}">
                            <i class="fa-solid fa-film"></i>
                            <span class="ms-2">Film/Movie</span>
                        </a>
                        <div class="sb-sidenav-menu-heading">Settings</div>
                        <a class="nav-link {{ $activeMenu == 'banner' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/banner') }}">
                            <i class="fa-regular fa-image"></i>
                            <span class="ms-2">Banner</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'information' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/information') }}">
                            <i class="fa-solid fa-globe"></i>
                            <span class="ms-2">Informations</span>
                        </a>
                        <a class="nav-link" href="{{ url('/') }}" target="_blank">
                            <i class="fa-regular fa-paper-plane"></i>
                            <span class="ms-2">Visit Website</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-4 px-4">
                    @yield('content')
                </div>
            </main>

            <footer class="py-4 bg-white mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">
                            Powered by <strong class="text-primary">{{ env('APP_COPYRIGHT') }}</strong> &copy;
                            {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="logoutModalLabel">Confirm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are your sure for sign out in application now ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">No,
                        Cancel!</button>
                    <a class="btn btn-danger text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Yes, Signout!
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @yield('extra-script')
    @include('sweetalert::alert')
</body>

</html>
