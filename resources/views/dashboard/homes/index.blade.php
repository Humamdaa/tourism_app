

@extends('dashboard.layouts.admin')
@section('content')
    <h1>Homes Management</h1>

    <h2>Verified Homes</h2>
    <ul>
        @foreach($verifiedHomes as $home)
            <li>
                <a href="{{ route('admin.homes.show', $home->id) }}">{{ $home->location }} - {{ $home->monthly_rent }} USD</a>
            </li>
        @endforeach
    </ul>

    <h2>Unverified Homes</h2>
    <ul>
        @foreach($unverifiedHomes as $home)
            <li>
                <a href="{{ route('admin.homes.show', $home->id) }}">{{ $home->location }} - {{ $home->monthly_rent }} USD</a>
            </li>
        @endforeach
    </ul>
@endsection
