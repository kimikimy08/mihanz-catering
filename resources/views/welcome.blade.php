@extends('layouts.app')


@section('content')

    <link rel="stylesheet" href="{{ asset('css/Index.css') }}">


    <div class="landing_Page">
        <h1>Mihanz Catering Service</h1>

        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    @if (auth()->user()->hasRole('admin'))
                        <button><a href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin Dashboard</a></button>
                    @else
                        <button><a href="{{ route('user.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">User Dashboard</a></button>
                    @endif

                    @else
                    <button><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></button>

                    @endauth
                </div>
            @endif

    </div>
    <div class="mihanz-info">
        <h1>
            Mihanz <br/> Catering 
            <p id="p1">Since 2015</p>
        
        </h1>
        <p id="p2">Mihanz Catering is a food service business that has been serving its clients for 8 years and continues, located at 181 Calderon St.Subic Baliwag ,Bulacan, San Rafael, Philippines, 3010. founded in 2015, the business started through Mr. Antonio Javier’s passion for cooking and his business partner Golando Masi saw it as an opportunity. He offered Antonio Javier, who happened to be his brother- in-law, to finance the business. Antonio agreed and the business started as a small canteen. As a fellow business minded, Mr. Antonio Javier already set his plans and aiming to make a catering which after years of hard work was finally achieved, the business was named after Mirai Javier “Mi” whom is Antonio’s daughter and Yohanz Masi who is the son of Golando both combined to form the now “Mihanz Catering”.</p>
    </div>

    <div class="reservation-Info">
        <h1>
            Ready to make your <br/>reservation? 
        </h1>
        <ul>
            <li>Amazing Deals</li>
            <li>Make your reservation within 7 days for preparations</li>
            <li>We can customize your package base on your budget</li>
            <li>Check out our menu below</li>
        </ul>
        <div><button type="button"> <a href="./USER/PHP/Menu.php">Check out our Menu</a> </button></div>

    </div>

    <div class="calendar-Date">

        <div>
            <h1>Mark your Dates</h1>
        <p>Here is our Available Event dates <br/>
        
          <b id="green">Green</b> means its Available</p>
        <p><b id="red">Red</b> means it's Occupied</p>
        </div>
        
        <div class="calendar">
        <Calendar/>
        </div>
        </div>      

        @endsection
        


