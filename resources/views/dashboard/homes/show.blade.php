<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Details</title>
    <link rel="stylesheet" href="{{ asset('css/home_details.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/css/home/showHomeStyles.css') }}">

</head>
<body>
    <header>
        <div id="nav_bar">
            @include('dashboard.nav_bar.nav')
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Home Details</h1>
            <h2>Home data</h2>
            <p><strong>ID:</strong> {{ $home->id }}</p>
            <p><strong>Space:</strong> {{ $home->space }} m</p>
            <p><strong>Location:</strong> {{ $home->location }}</p>
            <p><strong>Description:</strong> {{ $home->description }}</p>
            <p><strong>Monthly Rent:</strong> {{ $home->monthly_rent }} USD</p>
            <p><strong>Person Num:</strong> {{ $home->person_num }}</p>
            <p><strong>Rooms:</strong> {{ $home->rooms }}</p>
            <p><strong>Baths:</strong> {{ $home->baths }}</p>
            <p><strong>City ID:</strong> {{ $home->city_id }}</p>
            <p><strong>Verification Status:</strong> {{ $home->Verification_status }}</p>
            <h2>Owner data</h2>
            <p><strong>User Owner id :</strong> {{ $home->user_owner_id }}</p>
            <p><strong>User Owner id :</strong> {{ $home->owner->id }}</p>
            <p><strong>User Owner Name :</strong> {{ $home->owner->name }}</p>
            <p><strong>User Owner email :</strong> {{ $home->owner->email }}</p>
            <p><strong>User Owner number :</strong> {{ $home->owner->phone }}</p>

            <form action="{{ route('admin.homes.verify', $home->id) }}" method="POST" class="status-form">
                @csrf
                <label for="Verification_status">Change Verification Status:</label>
                <select name="Verification_status" id="Verification_status">
                    <option value="Verified" {{ $home->Verification_status == 'Verified' ? 'selected' : '' }}>Verified</option>
                    <option value="Unverified" {{ $home->Verification_status == 'Unverified' ? 'selected' : '' }}>Unverified</option>
                </select>
                <button type="submit" class="update-button">Update Status</button>
            </form>

            <form action="{{ route('admin.homes.destroy', $home->id) }}" method="POST" class="delete-form">
                @csrf
                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this home?')">Delete Home</button>
            </form>

            <a href="{{ route('admin.homes.index') }}" class="back-link">Back to Home List</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 ElaTravel Company</p>
    </footer>
</body>
</html>
