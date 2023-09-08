<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/dashBoard.css">
    <title>User Dashboard</title>
</head>
<nav>
    <ul>
        <li><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""><p><!-- mihanzcatering --></p></a></li>
       <li class="active"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
       <li><a href="{{ route('user.show', ['id' => auth()->user()->id]) }}">User Profile</a></li>
       <li><a href="{{ url('/menus') }}">Menu</a></li>
       <li><a href="{{ url('/themes') }}">Themes</a></li>
       <li><a href="Services.html">New Reservation</a></li>
       <li><a href="{{ url('/history') }}">History</a></li>
       <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

    </ul>
</nav>
<body>
    <div class="container">
       <h1 class="title"><!-- Dashboard --></h1>
        <div class="dashboardContainer">
            <ul >
                <li><h1>Reservation</h1><p>0</p></li>
                <li><h1>Past Events</h1><p>0</p></li>
            
            </ul>
        </div>
        
        </div>
    
</body>
</html>