<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/img/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>


    <title>{{ config('app.name', 'House Sharing') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    {{--  Swiper      --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    {{-- Yandex API --}}
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{getenv('YANDEX_MAP_KEY')}}&lang=ru_RU"
            type="text/javascript">
    </script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

{{ $slot }}

</body>
</html>
