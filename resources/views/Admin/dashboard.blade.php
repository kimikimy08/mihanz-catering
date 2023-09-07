<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/menuPages.css') }}menuPages.css">
</head>
<nav>
    <ul>
        <li><a href="/Index.html" id="logo"><img src="/ADMIN/IMAGES/LOGO.png" alt="LOGO"><p>mihanzcatering</p></a></li>        
        <li><a href="../adminDashboard.html">Dashboard</a></li>
        <li><a href="../adminUsers.html">Users</a></li>
        <li class="active"><a href="../adminMenu.html">Menu</a></li>
        <li><a href="../adminThemes.html">Themes</a></li>
        <li ><a href="../adminServices.html">Services</a></li>
        <li><a href="../adminBookings.html">Bookings</a></li>
        <li><a href="../adminReservation.html">Reservation</a></li>
        <li><a href="/ADMIN/Index.html">Log Out</a></li>
    </ul>
</nav>
<body>
    <div class="container">
        
        <div class="menu-nav">
            
            <ul>
                <li ><a href="porkMenu.html">Pork</a></li>
                <li class="active"><a href="beefMenu.html">Beef</a></li>
                <li><a href="chickenMenu.html">Chicken</a></li>
                <li><a href="fishMenu.html">Fish</a></li>
                <li><a href="seafoodMenu.html">Seafood</a></li>
                <li><a href="pastaMenu.html">Pasta</a></li>
                <li><a href="dessertMenu.html">Dessert</a></li>
                <li><a href="drinksMenu.html">Drinks</a></li>
                    
            </ul>
        </div>
        <main>
            <h1 class="title">Beef Menu</h1>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                <tr>
                    <td>file</td>
                    <td>Name</td>
                    <td>ipsum</td>
                    <td>700</td>
                    <td>active</td>
                    <td><a href="../FORMS/Menudatatable.html">Update</a></td>
                </tr>
        </table>

        </main>

    </div>
    
    
</body>
</html>