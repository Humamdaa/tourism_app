<?php

namespace App\Models\Flights;

use App\Models\Flights\FlightsGo\FlightGo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = ['name'];

    public function flightsGo()
    {
        return $this->belongsToMany(FlightGo::class, 'class_flight_go',
            'class_id', 'flightGo_id')
            ->withPivot('price', 'capacity');
    }
}
