<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel cities</title>
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/hotels/cities.css')}}"/>

</head>
<body>

{{--nav bar--}}
<div id="nav_bar">
    @include('dashboard.nav_bar.nav')
</div>

{{--search field--}}
<div class="search-container">
    <form action="{{ route('hotel.search_city') }}" method="GET" style="display: flex; align-items: center;">
        <input type="search" name="input" class="search-field" placeholder="Search..." style="flex-grow: 1;">
        <button type="submit" class="search_button">Search</button>
    </form>
    <span class="search-icon">&#128269;</span> <!-- Unicode character for magnifying glass -->
</div>


{{--result of search--}}
@if(session('result'))
    @php
        $result = session('result'); // Retrieve the session data and assign it to $result
    @endphp
    <div id="search-results">
        @foreach($result as $city)
            <div class="city-result">
                <a href="{{route('city.hotels', ['city_name' => $city->name])}}" class="city-name">{{ $city->name }}</a>
            </div>
        @endforeach
    </div>
@endif

<div class="background">
    <img src="{{asset('Admin_dashboard/assets/cities/Paris.jpg')}}" class="background-image" alt="hero-section image">

    <!-- grid -->
    <div class="grid-slider">
        <div class="grid-item hide"></div>
        <div class="grid-item hide"></div>
        <div class="grid-item hide"></div>
        <div class="grid-item hide"></div>
        <div class="grid-item hide"></div>
        <div class="grid-item hide"></div>
    </div>

{{--    cities--}}
</div>
<div class="container">
    <div class="city-grid">
        @foreach($cities as $ci)
            <div class="city-card">
                <a href="{{route('city.hotels',['city_name' => $ci->name])}}">{{$ci->name}}</a>
            </div>
        @endforeach
    </div>
</div>
</div>

<script src="{{asset('Admin_dashboard/js/hotels/cities.js')}}"></script>

</body>
</html>
