<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Include authentication routes
include __DIR__.'/auth.php';
include __DIR__.'/profile.php';


include __DIR__ . '/stays/hotels.php';
include __DIR__ . '/stays/homes.php';

include __DIR__ . '/city/city.php';



