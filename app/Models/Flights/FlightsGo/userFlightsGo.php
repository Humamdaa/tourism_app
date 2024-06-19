<?php

namespace App\Models\Flights\FlightsGo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userFlightsGo extends Model
{
    use HasFactory;

    protected $table = 'user_flights_go';
    protected $fillable =
        ['passenger', 'user_id', 'flightGo_id', 'class_id'];

}
