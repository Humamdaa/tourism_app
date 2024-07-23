<?php

namespace App\Models\Flights\FlightsRound;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userFlightRound extends Model
{
    use HasFactory;

    protected $table = 'user_flights_round';

    protected $fillable = [
        'passenger',
        'taken',
        'class_id',
        'flightRound_id',
        'user_id'
    ];}
