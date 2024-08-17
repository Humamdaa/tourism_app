<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Add New Home</h1>

    <!-- Display errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<!-- Add Home Form -->
    <form action="{{route('store.home') }}" method="POST">
    @csrf

    <!-- Input fields for home details -->
        <div class="form-group">
            <label for="space">Space (sqm)</label>
            <input type="number" class="form-control" id="space" name="space" required value="{{ old('space') }}">
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required
                   value="{{ old('location') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"
                      required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="monthly_rent">Monthly Rent (USD)</label>
            <input type="number" class="form-control" id="monthly_rent" name="monthly_rent" required
                   value="{{ old('monthly_rent') }}">
        </div>

        <div class="form-group">
            <label for="person_num">Number of People</label>
            <input type="number" class="form-control" id="person_num" name="person_num" required
                   value="{{ old('person_num') }}">
        </div>

        <div class="form-group">
            <label for="rooms">Number of Rooms</label>
            <input type="number" class="form-control" id="rooms" name="rooms" required value="{{ old('rooms') }}">
        </div>

        <div class="form-group">
            <label for="baths">Number of Bathrooms</label>
            <input type="number" class="form-control" id="baths" name="baths" required value="{{ old('baths') }}">
        </div>

        <div class="form-group">
            <label for="city_id">City</label>
            <select class="form-control" id="city_id" name="city_id" required>
                <!-- نفترض هنا أن قائمة المدن موجودة في قاعدة البيانات -->
                <!-- قد تحتاج إلى تمرير المدن من الـ Controller إلى الـ Blade -->
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option
                        value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Add Home</button>
    </form>

    @if(session('error'))
      {{session('error')}}
        @endif
</div>
</body>
</html>
