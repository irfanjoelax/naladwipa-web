<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(env('APP_LOGO')) }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('zenblog/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('zenblog/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('zenblog/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('zenblog/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('zenblog/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{ asset('zenblog/assets/css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('zenblog/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <x-header></x-header>
    <!-- End Header -->

    <!-- ======= Main ======= -->
    <main id="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <x-footer></x-footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('zenblog/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('zenblog/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('zenblog/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('zenblog/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('zenblog/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('zenblog/assets/js/main.js') }}"></script>
    @yield('extra-script')
</body>

</html>
