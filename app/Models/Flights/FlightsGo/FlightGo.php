<?php

namespace App\Models\Flights\FlightsGo;

use App\Models\Flights\Classes;
use App\Models\Flights\Office;
use App\Models\hotels\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightGo extends Model
{
    use HasFactory;

    protected $table = 'flightsgo';

    protected $fillable =
        ['date', 'takeoff', 'landing', 'duration',
            'capacity', 'office_id', 'from_city_id', 'to_city_id'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_flights_go', 'flightGo_id', 'user_id')
            ->withPivot('passenger');
    }

    public function classes()
    {
        return $this->belongsToMany(classes::class, 'class_flight_go', 'flightGo_id', 'class_id')
            ->withPivot('price','capacity');
    }
}
