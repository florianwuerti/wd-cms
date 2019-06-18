<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', '') - @yield('site_title', 'CMS Web Application')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app-backend.css') }}" rel="stylesheet">
</head>
<body>

@include('_includes.nav.main')

@include('_includes.nav.manage')
<div class="management-area" id="app">

    <main>
        @yield('content')
    </main>

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

</body>
</html>