<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    {{--for bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Slideshow</title>
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/city/city.css')}}"/>
</head>
<body>

<div id="nav_bar">
    @include('dashboard.nav_bar.nav')
</div>

<div class="slider">
    <!-- list Items -->
    <div class="list">
        <div class="item active">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_1.jpg')}}" alt="Damasucs">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_2.jpg')}}" alt="Damasucs">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_3.jpg')}}" alt="Los Angeles">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_4.jpg')}}" alt="Los Angeles">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_5.jpg')}}" alt="Paris">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_6.jpg')}}" alt="Paris">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_7.jpg')}}" alt="New York">
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_8.jpg')}}" alt="New York">
        </div>


    </div>

    <!-- button arrows -->
    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>

    <!-- thumbnail -->
    <div class="thumbnail">
        <div class="item active">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_1.jpg')}}" alt="Damasucs">
            <div class="content">
                Damascus
            </div>
        </div>
        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_2.jpg')}}" alt="Damasucs">
            <div class="content">
                Damascus
            </div>
        </div>
        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_3.jpg')}}" alt="Los Angeles">
            <div class="content">
                Los Angeles
            </div>
        </div>
        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_4.jpg')}}" alt="Los Angeles">
            <div class="content">
                Los Angeles
            </div>
        </div>
        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_5.jpg')}}" alt="Paris">
            <div class="content">
                Paris
            </div>
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_6.jpg')}}" alt="Paris">
            <div class="content">
                Paris
            </div>
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_7.jpg')}}" alt="New York">
            <div class="content">
                New York
            </div>
        </div>

        <div class="item">
            <img src="{{asset('Admin_dashboard/assets/cities/OIP_8.jpg')}}" alt="New York">
            <div class="content">
                New York
            </div>
        </div>

    </div>
</div>


{{--{{$cities}}--}}

<div class="container my-4">
    <div class="header">
        <h1 class="mb-4">City List</h1>
        <a href="{{route('city.create')}}" class="add_city">Add city</a>
    </div>
    @if(session('success'))
        <div id="successMessage" class="alert alert-success">
            {{ session('success') }}
            <span id="timer" style="margin-left: 10px;">(5 seconds)</span>

        </div>
    @endif
    <div class="row">
        @forelse($cities as $city)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{asset("Admin_dashboard/assets/cities/$city->name.jpg")}}" class="card-img-top"
                         alt="{{ $city->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $city->name }}</h5>
                        <p class="card-text">{{$city->population}}</p>
                        <div class="btn-group">
                            <a href="{{ route('city.edit', $city->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('city.destroy', $city->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No cities found</p>
        @endforelse
    </div>
</div>

<script src="{{asset('Admin_dashboard/js/city/city.js')}}"></script>

{{--for bootstrap--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
