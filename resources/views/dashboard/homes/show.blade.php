@extends('dashboard.layouts.admin')
@section('content')
    <h1>Home Details</h1>

    <p><strong>ID:</strong> {{ $home->id }}</p>
    <p><strong>Space:</strong> {{ $home->space }} sqm</p>
    <p><strong>Location:</strong> {{ $home->location }}</p>
    <p><strong>Description:</strong> {{ $home->description }}</p>
    <p><strong>Monthly Rent:</strong> {{ $home->monthly_rent }} USD</p>
    <p><strong>Person Num:</strong> {{ $home->person_num }}</p>
    <p><strong>Rooms:</strong> {{ $home->rooms }}</p>
    <p><strong>Baths:</strong> {{ $home->baths }}</p>
    <p><strong>City ID:</strong> {{ $home->city_id }}</p>
    <p><strong>Verification Status:</strong> {{ $home->Verification_status }}</p>

    <form action="{{ route('admin.homes.verify', $home->id) }}" method="POST">
        @csrf
        <label for="Verification_status">Change Verification Status:</label>
        <select name="Verification_status" id="Verification_status">
            <option value="Verified" {{ $home->Verification_status == 'Verified' ? 'selected' : '' }}>Verified</option>
            <option value="Unverified" {{ $home->Verification_status == 'Unverified' ? 'selected' : '' }}>Unverified</option>
        </select>
        <button type="submit">Update Status</button>
    </form>

    <form action="{{ route('admin.homes.destroy', $home->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to delete this home?')">Delete Home</button>
    </form>

    <a href="{{ route('admin.homes.index') }}">Back to Home List</a>
@endsection
