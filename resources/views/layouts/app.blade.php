<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" size="16x16" href="assets/images/favicon.ico">

        <title>Zonepropia - @yield('title')</title>

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        {{-- Font Awsome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- @yield('scripts') --}}
    </head>
    <body class="antialiased">
      @include('navmenu')
      @include('currencyBar')
      {{-- Page Content --}}
      @yield('content')
      @include('footer')
    </body>
</html>
