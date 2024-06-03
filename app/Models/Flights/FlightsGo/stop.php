<?php

namespace App\Models\Flights\FlightsGo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stop extends Model
{
    use HasFactory;

    protected $table = 'stops';
    protected $fillable = ['name'];

    public function flightsGo()
    {
        return $this->belongsToMany(FlightGo::class, 'flights_go_stops',
            'stop_id', 'flightGo_id');
    }
}
