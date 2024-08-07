<?php

use App\Http\Controllers\UserLocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Notifications\Real_time\CommentSent;


// Include routes
include __DIR__ . '/auth.php';

include __DIR__ . '/profile.php';

include __DIR__ . '/stays/hotels.php';

include __DIR__ . '/stays/homes.php';

include __DIR__ . '/city/city.php';

include __DIR__ . '/Flights/flights.php';

include __DIR__ . '/languages/language.php';

include __DIR__ . '/currency/currency.php';

include __DIR__ . '/dashboard/index.php';


Route::get('/location', [UserLocation::class, 'index']);

