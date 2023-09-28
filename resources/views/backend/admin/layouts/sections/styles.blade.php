    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/font/CS-Interface/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
        integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/vendor/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('backend/css/vendor/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}" />
    <script src="{{ asset('backend/js/base/loader.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @font-face {
            font-family: Laravolt;
            src: url({{ asset('fonts/laravolt.woff') }});
        }
    </style>
    {{-- @livewireStyles --}}
    @yield('page-styles')
