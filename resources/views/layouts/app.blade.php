<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mihanz Catering') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .navbar-nav .nav-link {
            color: white;
            font-size: 24px;
        }

        .navbar-brand {
            font-size: 24px;
        }

        nav img{
            height: 100px;
        }
        nav #mcName{
            font-size: 14px;
            margin-top: -25px;
        }

    </style>
</head>
<body>
    <div id="app">

    <nav class="navbar navbar-expand-md navbar-dark bg-green shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <h1><img src="{{ asset('images/logo.png') }}" alt="MC-LOGO">
        <p id="mcName"><!-- {{ config('app.name', 'Mihanz Catering') }} --></p></h1>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item" >
                                    <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/menus') }}">{{ __('Menu') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/services') }}">{{ __('Services') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/themes') }}">{{ __('Theme') }}</a>
                                </li>
                           @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif 
                        @else

                                <li class="nav-item">
                                     @if (auth()->user()->hasRole('admin'))
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    @else
                                    <a class="nav-link" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                                    @endif

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/menus') }}">{{ __('Menu') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/services') }}">{{ __('Services') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/themes') }}">{{ __('Theme') }}</a>
                                </li>



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.show', ['id' => auth()->user()->id]) }}">
                                        {{ __('User Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>





<footer>
    <h1>
        Mihanz <br/> Catering
    </h1>

    <ul>
        <li>
            <label for="getInTouch">Get in touch</label>
            <br/><a href="https://www.facebook.com/profile.php?id=100066545202436" target="_blank" rel="noreferrer"><FaFacebook/>Facebook</a>
        </li>
        <li>
            <label for="Contact">Contact</label><br/>
            <a href="#"> <FaMobileScreen/>0926-563-1143 <br/>
               <FaMobileScreen/> 0916-412-2250</a>
         </li>
         <li>
            <label for="Location">Location</label> <br/>
            <a href="https://goo.gl/maps/eYMwkLUwLh3tVrsLA" target="_blank" rel="noreferrer"><FaMapLocationDot/> Calderon St. Subic
                Baliwag, Bulacan</a>
         </li>
            <a href="./ADMIN/Index.html"> Admin</a>
    </ul>

</footer>

<script></script>

</html>
