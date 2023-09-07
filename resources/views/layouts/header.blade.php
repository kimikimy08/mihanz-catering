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
    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<nav>
    <ul>
        <li><a href="/Index.html" id="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"><!-- <p>mihanzcatering</p> --></a></li>
        <li class="active"><a href="adminDashboard.html">Dashboard</a></li>
        <li><a href="{{ url('/users') }}">Users</a></li>
        <li><a href="{{ route('admin.menu') }}">Menu</a></li>
        <li><a href="adminThemes.html">Themes</a></li>
        <li ><a href="adminServices.html">Services</a></li>
        <li><a href="{{ url('/bookings') }}">Bookings</a></li>
        <li><a href="{{ url('/reservations') }}">Reservation</a></li>
        <li><a href="../Index.html">Log Out</a></li>
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