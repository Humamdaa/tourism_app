<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('Admin_dashboard/css/city/create_city.css')}}"/>

    <title>create city</title>
</head>
<body>

<div class="container">
    <div class="error_message">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <h2>Create New City</h2>
    <form id="createCityForm" action="{{ route('city.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">City Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="information">Information About This City:</label>
            <textarea id="information" name="information" rows="6" placeholder="Enter details about the city here..." required></textarea>

        </div>

        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="number" id="latitude" name="latitude" step="0.000001" required>
        </div>

        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="number" id="longitude" name="longitude" step="0.000001" required>
        </div>

        <div class="form-group">
            <label for="photos">Upload Photos:</label>
            <input type="file" id="photos" name="photos[]" multiple>
            <small class="form-text text-muted">You can upload up to 4 photos '.jpg'</small>
        </div>

        <button type="submit" class="submit-btn">Create City</button>
    </form>

</div>

<script src="{{asset('Admin_dashboard/js/city/create_city.js')}}"></script>

</body>

</html>
