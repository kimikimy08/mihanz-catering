<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<nav>
    <ul>
    <li><a href="{{ url('/') }}" id="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a></li>
        <li class="{{ Request::is('admin-dashboard*') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ url('/users') }}">Users</a></li>
        <li class="{{ Request::is('menu*') ? 'active' : '' }}"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
        <li class="{{ Request::is('theme*') ? 'active' : '' }}"><a href="{{ route('admin.themes.index') }}">Themes</a></li>
        <li class="{{ Request::is('service*') ? 'active' : '' }}"><a href="{{ route('admin.services.index') }}">Services</a></li>
        <li class="{{ Request::is('bookings*') ? 'active' : '' }}"><a href="{{ url('/bookings') }}">Bookings</a></li>
        <li class="{{ Request::is('reservations*') ? 'active' : '' }}"><a href="{{ url('/reservations') }}">Reservation</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </ul>
</nav>
<body>
    <div class="container">
        <main>
    @yield('content')
        </main>
    </div>
    </body>
    </html>
