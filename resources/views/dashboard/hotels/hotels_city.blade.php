<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--    for bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/hotels/hotels_city.css')}}"/>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container my-4">
    <div class="header">
        <h1 class="mb-4">Hotel List</h1>
        <a href="{{route('hotel.create',['city_name'=>$city])}}" class="add_city">Add Hotel in {{$city}}</a>
    </div>
    @if(session('success'))
        <div id="successMessage" class="alert alert-success">
            {{ session('success') }}
            <span id="timer" style="margin-left: 10px;">(5 seconds)</span>

        </div>
    @endif
    <div class="row">
        @for ($i = 0; $i < count($hotels); $i++)
            <div class="col-md-3 mb-4">
                <div class="card">
                    {{--                    check if there are photos for hotels to avoid error --}}
                    @if(isset($imgs[$i]))
                        <img src="{{asset("hotels/$city/" . $imgs[$i])}}" class="card-img-top"
                             alt="{{ $hotels[$i]->name }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $hotels[$i]->name }}</h5>
                        <div class="btn-group">
                            <a href="{{ route('hotel.edit', [$hotels[$i]->id]) }}"
                               class="btn btn-primary">Edit</a>
                            <form action="{{ route('hotel.destroy', $hotels[$i]->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endfor

    </div>
</div>

{{--for bootstrap--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
