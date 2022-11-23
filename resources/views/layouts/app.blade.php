<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AES-Algorithm') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AES') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('dist/assets/images/logo/logo.png') }}">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.css') }} ">

    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/simple-datatables/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/choices.js/choices.min.css') }} " />

    <link rel="stylesheet" href="{{ asset('css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('dist/assets/images/logo/logo.png') }}" type="image/x-icon">
</head>

<body>

    <div id="app">
        @include('includes.sidebar')
        @include('sweetalert::alert')


        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block ">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            @include('includes.footer')
        </div>

    </div>
    {{-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script> --}}
    <script src="{{ asset('js/jquery3-6-1.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }} "></script>

    <script src="{{ asset('dist/assets/js/main.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>

    <script src="{{ asset('js/brands.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>

    @include('sweetalert::alert')
    @yield('script')

</body>

</html>
