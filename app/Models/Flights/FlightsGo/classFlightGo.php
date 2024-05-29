<?php

namespace App\Models\Flights\FlightsGo;

use App\Models\Flights\Classes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classFlightGo extends Model
{
    use HasFactory;

    protected $table = 'class_flight_go';
    protected $fillable = ['capacity', 'price', 'class_id', 'flightGo_id'];



    public function flightsGo()
    {
        return $this->belongsToMany(FlightGo::class, 'class_flight_go',
            'class_id', 'flightGo_id')
            ->withPivot('price','capacity');
    }

}
