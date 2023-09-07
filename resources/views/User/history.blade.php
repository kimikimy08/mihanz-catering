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
       <li ><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
       <li><a href="{{ route('user.show', ['id' => auth()->user()->id]) }}">User Profile</a></li>
       <li><a href="{{ url('/menu') }}">Menu</a></li>
       <li><a href="{{ url('/themes') }}">Themes</a></li>
       <li><a href="Services.html">New Reservation</a></li>
       <li class="active"><a href="{{ url('/history') }}">History</a></li>

    </ul>
</nav>
<body>
    <div class="container">
    <main>
        <h1 class="title">History</h1>
        <table>
            <tr>
                <th>Event</th>
                <th>Location</th>
                <th>Date</th>
                <th>Status</th>
                <th>Comments</th>
                <th></th>
            </tr>
            <tr>
                <td>Birthday</td>
                <td>Malolos Bulacan</td>
                <td>05/11/23</td>
                <td>Declined</td>
                <td>Change of Plan</td>
                <td><a href="">View</a></td>
            </tr>
    </table>

    </main>
</div> 
</body>
</html>