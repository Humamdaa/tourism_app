<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/hotels/create_hotel.css')}}"/>

    <title>Edit Hotel</title>
</head>
<body>

<form method="post" action="{{ route('hotel.update', [$hotel->id]) }}">
@csrf
@method('PUT')

<!-- Hotel Details Section -->
    <h3>Update Hotel Details</h3>

    <div class="form-group">
        <label for="name">Hotel Name</label>
        <input type="text" class="form-control" id="name" name="Hotel_name"
               value="{{ $hotel->name }}" required>
    </div>

    <div class="form-group">
        <label for="phone_hotel">Phone Number</label>
        <input type="text" class="form-control" id="phone_hotel" name="phone_hotel"
               value="{{ $hotel->phone_hotel }}" required>
    </div>

    <div class="form-group">
        <label for="rate">Rate</label>
        <input type="number" class="form-control" id="rate" name="rate" max="5" min="1" step="1"
               value="{{ $hotel->rate }}" required oninput="validateRate()">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price"
               value="{{ $hotel->price }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required>
            {{ $hotel->description }}
        </textarea>
    </div>

    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input type="text" class="form-control" id="latitude" name="latitude"
               value="{{ $hotel->latitude }}" required>
    </div>

    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input type="text" class="form-control" id="longitude" name="longitude"
               value="{{ $hotel->longitude }}" required>
    </div>

    <!-- Rooms Section -->
    <h3>Rooms</h3>
    @foreach($rooms as $index => $room)
        <div class="form-group room-field">
            <label for="room_{{ $index + 1 }}_person_num">Room {{ $index + 1 }} - Capacity (Persons)</label>
            <input type="number" class="form-control" id="room_{{ $index + 1 }}_person_num"
                   name="rooms[{{ $index }}][person_num]"
                   value="{{ $room->person_num }}" required>
            <button type="button" class="btn btn-danger remove-room">Remove</button>
        </div>
    @endforeach
    <button type="button" class="btn btn-secondary mb-3" id="add-room">Add Another Room</button>

    <!-- Services Section -->
    <h3>Services</h3>
    @foreach($services as $index => $service)
        <div class="form-group service-field">
            <label for="service_{{ $index + 1 }}_name">Service {{ $index + 1 }}</label>
            <input type="text" class="form-control" id="service_{{ $index + 1 }}_name" name="services[]"
                   value="{{ $service->name }}" required>
            <button type="button" class="btn btn-danger remove-service">Remove</button>
        </div>
    @endforeach
    <button type="button" class="btn btn-secondary mb-3" id="add-service">Add Another Service</button>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update All Details</button>
</form>

@if(session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif

<script src="{{asset('Admin_dashboard/js/hotels/create_hotel.js')}}"></script>

</body>
</html>
