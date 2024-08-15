<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit City</title>
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/city/Edit_city.css')}}"/>
</head>
<body>

<div class="form-container">
    <h2>Edit City</h2>
    <form method="post" action="{{ route('city.update', $city->id) }}" id="editCityForm">
    @csrf
    @method('PUT') <!-- Method Spoofing for PUT request -->

        <label for="name">City Name:</label>
        <input type="text" id="name" name="name" value="{{ $city->name }}" required>

        <label for="population">Population:</label>
        <textarea id="population" name="population" required>{{ $city->population }}</textarea>

        <label for="latitude">Latitude:</label>
        <input type="number" id="latitude" name="latitude" step="0.000001" value="{{ $city->latitude }}" required>

        <label for="longitude">Longitude:</label>
        <input type="number" id="longitude" name="longitude" step="0.000001" value="{{ $city->longitude }}" required>

        <button type="submit">Save Changes</button>
    </form>

</div>
<script src="{{asset('Admin_dashboard/js/city/Edit_city.js')}}"></script>
</body>
</html>
