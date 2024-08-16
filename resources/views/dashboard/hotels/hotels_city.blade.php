<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/hotels/hotels_city.css')}}"/>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
        @forelse($hotels as $h)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{asset("Admin_dashboard/hotels/$city->name.jpg")}}" class="card-img-top"
                         alt="{{ $h->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $h->name }}</h5>
{{--                        <p class="card-text">{{$h->population}}</p>--}}
                        <div class="btn-group">
                            <a href="{{ route('city.edit', $h->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('city.destroy', $h->id) }}" method="POST" class="d-inline">
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

</body>
</html>
