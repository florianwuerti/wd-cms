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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item is-paddingless brand-item" href="#">
                    <img src="{{asset('images/logo.png')}}" alt="CMS Logo">
                </a>

                <button class="button navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item is-tab">Learn</a>
                    <a class="navbar-item is-tab">Discuss</a>
                    <a class="navbar-item is-tab">Share</a>
                </div> <!-- end of .navbar-start -->

                <div class="navbar-end nav-menu" style="overflow: visible">
                    @guest
                        <a href="{{route('manage.login')}}" class="navbar-item is-tab">Login</a>
                        <a href="#" class="navbar-item is-tab">Join the Community</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">Hey {{Auth::user()->name}}</a>
                            <div class="navbar-dropdown is-right">
                                <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-fw fa-user-circle-o m-r-5"></i></span>Profile</a>
                                <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-fw fa-bell m-r-5"></i></span>Notifications</a>
                                <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-fw fa-cog m-r-5"></i></span>Manage</a>
                                <hr class="navbar-divider">
                                <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon"><i class="fa fa-fw fa-sign-out m-r-5"></i></span>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>