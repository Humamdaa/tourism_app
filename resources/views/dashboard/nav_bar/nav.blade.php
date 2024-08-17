<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="{{asset('/Admin_dashboard/css/nav_bar/nav.css')}}" />

</head>
<body>
<div id="nav_bar"></div>
<nav class="navbar">
    <div class="navbar-left">
        <span class="brand">Dashboard</span>
    </div>
    <ul class="nav-list">
        <li class="nav-item"><a href="{{route('hotel.index')}}" class="nav-link">Hotel</a></li>
        <li class="nav-item"><a href="{{route('flight')}}" class="nav-link">Flight</a></li>
        <li class="nav-item"><a href="{{route('city.index')}}" class="nav-link">City</a></li>
        <li class="nav-item"><a href="#Home" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#office" class="nav-link">Office</a></li>
    </ul>
</nav>
</body>
</html>
