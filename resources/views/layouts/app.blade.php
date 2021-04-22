<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" size="16x16" href="{{ asset('assets/images/favicon.ico') }}">

        <title>Zonapropia - @yield('title')</title>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @include('layouts.global_styles')
        @yield('styles')

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" ></script>
        @include('layouts.global_scripts')
        @yield('scripts')

    </head>
    <body class="antialiased">
      @include('navmenu')
      <x-message-bar/>
      {{-- Page Content --}}
      @yield('content')
      @include('footer')
    </body>
</html>
