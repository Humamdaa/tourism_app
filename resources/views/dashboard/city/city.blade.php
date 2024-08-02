<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{--for bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Slideshow</title>
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/city/city.css')}}" />
</head>
<body>
<!-- Slideshow container -->
<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_1.jpg')}}" style="width: 100%" />
        <div class="text">Damasucs</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_2.jpg')}}" style="width: 100%" />
        <div class="text">Damasucs</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_3.jpg')}}" style="width: 100%" />
        <div class="text">Los Angeles</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">4 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_4.jpg')}}" style="width: 100%" />
        <div class="text">Los Angeles</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">5 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_5.jpg')}}" style="width: 100%" />
        <div class="text">Paris</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">6 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_6.jpg')}}" style="width: 100%" />
        <div class="text">Paris</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">7 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_7.jpg')}}" style="width: 100%" />
        <div class="text">New York</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">8 / 8</div>
        <img src="{{asset('Admin_dashboard/assets/cities/OIP_8.jpg')}}" style="width: 100%" />
        <div class="text">New York</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- The dots/circles -->
<div style="text-align: center">
    <span class="circle" onclick="currentSlide(1)"></span>
    <span class="circle" onclick="currentSlide(2)"></span>
    <span class="circle" onclick="currentSlide(3)"></span>
    <span class="circle" onclick="currentSlide(4)"></span>
    <span class="circle" onclick="currentSlide(5)"></span>
    <span class="circle" onclick="currentSlide(6)"></span>
    <span class="circle" onclick="currentSlide(7)"></span>
    <span class="circle" onclick="currentSlide(8)"></span>
</div>

{{--{{$cities}}--}}

<div class="container my-4">
<h1 class="mb-4">City List</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    @forelse($cities as $city)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{asset("Admin_dashboard/assets/cities/$city->name.jpg")}}" class="card-img-top" alt="{{ $city->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $city->name }}</h5>
                    <p class="card-text">{{$city->population}}</p>
                    <div class="btn-group">
{{--                        {{ route('cities.edit', $city->id) }}--}}
                        <a href="#" class="btn btn-primary">Edit</a>
                        <form action="{{ route('Web_city.destroy', $city->id) }}" method="POST" class="d-inline">
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
