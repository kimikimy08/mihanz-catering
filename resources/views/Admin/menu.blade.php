<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Menu</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>

<nav>
    <ul>
        <li><a href="/Index.html" id="logo"><img src="{{ asset('images/logo.png') }}" alt="LOGO"><p>mihanzcatering</p></a></li>        
        <li><a href="adminDashboard.html">Dashboard</a></li>
        <li><a href="adminUsers.html">Users</a></li>
        <li class="active"><a href="adminMenu.html">Menu</a></li>
        <li><a href="adminThemes.html">Themes</a></li>
        <li ><a href="adminServices.html">Services</a></li>
        <li><a href="adminBookings.html">Bookings</a></li>
        <li><a href="adminReservation.html">Reservation</a></li>
        <li><a href="../Index.html">Log Out</a></li>
    </ul>
</nav>
<body>
    <div class="container">
        <h1 class="title">Menu</h1>

        <div class="adminMenuNav">
           <ul>

            <li>
                <a href="./adminMenuPages/porkMenu.html">
                    Pork Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/beefMenu.html">
                    Beef Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/chickenMenu.html">
                    Chicken Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/fishMenu.html">
                    Fish Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/seafoodMenu.html">
                    Seafood Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/pastaMenu.html">
                    Pasta Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/dessertMenu.html">
                    Dessert Menu
                </a>
            </li>

            <li>
                <a href="./adminMenuPages/drinksMenu.html">
                    Drinks Menu
                </a>
            </li>

           </ul>
        </div>








    </div>
    
    
</body>
</html>
