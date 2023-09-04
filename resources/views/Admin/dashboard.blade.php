<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<nav>
    <ul>
        <li><a href="/Index.html" id="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"><p>mihanzcatering</p></a></li>
        <li class="active"><a href="adminDashboard.html">Dashboard</a></li>
        <li><a href="adminUsers.html">Users</a></li>
        <li><a href="adminMenu.html">Menu</a></li>
        <li><a href="adminThemes.html">Themes</a></li>
        <li ><a href="adminServices.html">Services</a></li>
        <li><a href="adminBookings.html">Bookings</a></li>
        <li><a href="adminReservation.html">Reservation</a></li>
        <li><a href="../Index.html">Log Out</a></li>
    </ul>
</nav>
<body>
    <div class="container">
    <h1 class="title">Dashboard</h1>
    <div class="dashboardContainer">
        <ul >
            <a href="adminUsers.html"><li><h1>Users</h1><p>0</p></li></a>
            <li><h1>Incoming Events</h1><p>0</p></li>
            <li><h1>New Bookings</h1><p>0</p></li>
            <li><h1>Reservation</h1><p>0</p></li>
            <li><h1>Ongoing Events</h1><p>0</p></li>
            <li><h1>Past Events</h1><p>0</p></li>
        
        </ul>
    </div>
    
    </div>
</body>
</html>