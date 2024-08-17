<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homes Management</title>
    <link rel="stylesheet" href="{{ asset('admin_dashboard/css/home/homeStyles.css') }}">
    <link rel="stylesheet" href="{{asset('/Admin_dashboard/css/nav_bar/nav.css')}}" />
</head>
<body>
    <header>
        <div id="nav_bar">
            @include('dashboard.nav_bar.nav')
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Homes Management</h1>

            <h2>Verified Homes</h2>
            <ul>
                @foreach($verifiedHomes as $home)
                    <li>
                        <a href="{{ route('admin.homes.show', $home->id) }}">
                            @if($home->photos->isNotEmpty())
                                <img src="{{ asset('homes/' . $home->city->name . '/' . $home->photos->first()->img) }}" alt="Image of {{ $home->location }}" style="width: 100px; height: auto;">
                            @elseif(file_exists(public_path('homes/NewYork/newYork1-1.jpg')))
                                <img src="{{ asset('homes/NewYork/newYork1-1.jpg') }}" alt="Default image for New York" style="width: 100px; height: auto;">
                            @else
                                <p>No Image Available</p>
                            @endif
                            <div>
                                <strong>{{ $home->location }}</strong> - {{ $home->monthly_rent }} USD
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>

            <h2>Unverified Homes</h2>
            <ul>
                @foreach($unverifiedHomes as $home)
                    <li>
                        <a href="{{ route('admin.homes.show', $home->id) }}">
                            @if($home->photos->isNotEmpty())
                                <img src="{{ asset('homes/' . $home->city->name . '/' . $home->photos->first()->img) }}" alt="Image of {{ $home->location }}" style="width: 100px; height: auto;">
                            @elseif(file_exists(public_path('homes/NewYork/newYork1-1.jpg')))
                                <img src="{{ asset('homes/NewYork/newYork1-1.jpg') }}" alt="Default image for New York" style="width: 100px; height: auto;">
                            @else
                                <p>No Image Available</p>
                            @endif
                            <div>
                                <strong>{{ $home->location }}</strong> - {{ $home->monthly_rent }} USD
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>

    <footer>
        <p>&copy; ElaTravel Company</p>
    </footer>
</body>
</html>
