<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/hotels/create_hotel.css')}}"/>

    <title>Creat Hotel</title>
</head>
<body>

<form action="{{ route('hotel.store') }}" method="POST">
@csrf

<!-- Hotel Details Section -->
    <h3>Hotel Details</h3>

    {{--Hiddenn input city name--}}
    <input type="hidden" name="city_name" value="{{$city_name}}">

    <div class="form-group">
        <label for="name">Hotel Name</label>
        <input type="text" class="form-control" id="name" name="Hotel_name"
               required>
    </div>

    <div class="form-group">
        <label for="phone_hotel">Phone Number</label>
        <input type="text" class="form-control" id="phone_hotel" name="phone_hotel"
               required>
    </div>

    <div class="form-group">
        <label for="rate">Rate</label>
        <input type="number" class="form-control" id="rate" name="rate" max="5" min="1" step="1" required
               oninput="validateRate()">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input type="text" class="form-control" id="latitude" name="latitude"
               required>
    </div>

    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input type="text" class="form-control" id="longitude" name="longitude"
               required>
    </div>

    <!---------------- Rooms Section -------------->
    <h3>Rooms</h3>
    <div id="rooms-container">
        <div class="form-group room-field">
            <label for="room_1_person_num">Room 1 - Capacity (Persons)</label>
            <input type="number" class="form-control" id="room_1_person_num" name="rooms[0][person_num]" required>
            <button type="button" class="btn btn-danger remove-room">Remove</button>
        </div>
    </div>
    <button type="button" class="btn btn-secondary mb-3" id="add-room">Add Another Room</button>

    <!-- Services Section -->
    <h3>Services</h3>
    <div id="services-container">
        <div class="form-group service-field">
            <label for="service_1_name">Service 1</label>
            <input type="text" class="form-control" id="service_1_name" name="services[]" required>
            <button type="button" class="btn btn-danger remove-service">Remove</button>
        </div>
    </div>
    <button type="button" class="btn btn-secondary mb-3" id="add-service">Add Another Service</button>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Save All Details</button>
</form>

@if(session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif

<script src="{{asset('Admin_dashboard/js/hotels/create_hotel.js')}}"></script>

</body>
</html>
