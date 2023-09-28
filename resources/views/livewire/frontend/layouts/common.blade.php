<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ get_settings('favicon') }}" sizes="96x96" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page-title') | {{ get_settings('site_title') ?? config('app.name') }}</title>
    <meta name="description" content="{{ get_settings('meta_description') }}" />
    <meta name="title" content="{{ get_settings('meta_title') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="{{ asset('/frontend/css/custom.css') }}" rel="stylesheet">
    @yield('page-style')
    <style>
        :root {
            --site-primary: {{ get_settings('primary_color') }};
            --site-secondary: {{ get_settings('secondary_color') }};
            --site-text: {{ get_settings('text_color') }};
        }

        body {
            background-image: url({{ '/storage/' . get_settings('body_background_image') }})
        }
    </style>
</head>

<body>
    <div class="container px-4 py-0 main-container">
        @include('livewire/frontend/layouts/sections/header')
        {{ $slot }}
        @include('livewire/frontend/layouts/sections/footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    @yield('page-script')
    <script src="{{ asset('frontend/js/index.js') }}"></script>
</body>

</html>
