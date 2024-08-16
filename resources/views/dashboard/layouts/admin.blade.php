<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>


    <header>
        <!-- <h1>Admin Dashboard</h1> -->
        <div id="nav_bar">
    @include('dashboard.nav_bar.nav')
</div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>
</body>
</html>
