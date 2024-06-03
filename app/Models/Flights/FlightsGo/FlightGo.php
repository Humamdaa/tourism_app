<?php

namespace App\Models\Flights\FlightsGo;

use App\Models\city;
use App\Models\Flights\Classes;
use App\Models\Flights\Office;
use App\Models\Scopes\flightsGo\ClassPriceScope;
use App\Models\Scopes\flightsGo\FromToCityScope;
use App\Models\Scopes\flightsGo\numStopInFlightGo;
use App\Models\Scopes\flightsGo\typeClassScope;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FlightGo extends Model
{
    use HasFactory;

    protected $table = 'flightsgo';

    protected $fillable =
        [
            'date', 'takeoff', 'landing', 'duration', 'NumStops',
            'capacity', 'office_id', 'from_city_id', 'to_city_id'
        ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'flights_go_services', 'flightGo_id', 'service_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_flight_go',
            'flightGo_id', 'class_id')
            ->withPivot('price', 'capacity');
    }

    public function stops()
    {
        return $this->belongsToMany(stop::class, 'flights_go_stops',
            'flightGo_id', 'stop_id');
    }


    public function fromCity()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_flights_go',
            'flightGo_id', 'user_id')
            ->withPivot('passenger');
    }
    //scopes :

    //scope from to city with one month before and after almost
    public function scopeWithinDateRangeAndCities($query, $startDate, $fromCity, $toCity)
    {
        return FromToCityScope::fromToCity($query, $startDate, $fromCity, $toCity);
    }

    //scope for class with person number
    public function scopeWithClass($query, $class, $persons)
    {
        return TypeClassScope::specificClass($query, $class, $persons);
    }

    //for type of class
    public function scopeWithClassPrice($query, $type)
    {
        return ClassPriceScope::ClassPrice($query, $type);
    }

    //for number of stops
    public function scopeWithNumStops($query, $num)
    {
        return numStopInFlightGo::numStop($query, $num);
    }
}
