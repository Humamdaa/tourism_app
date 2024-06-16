<?php

namespace App\Http\Controllers\FlightGo;

use App\Http\Controllers\Controller;
use App\Services\FlightsGo\BookFlightGo;
use Illuminate\Http\Request;

class BookFlightGoController extends Controller
{
    public function book(Request $request)
    {
        $book = new BookFlightGo();
        $book->book($request);
    }
}
