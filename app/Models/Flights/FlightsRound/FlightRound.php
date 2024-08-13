<?php

namespace App\Models\Flights\FlightsRound;

use App\Models\city;
use App\Models\Flights\Classes;
use App\Models\Flights\FlightsGo\stop;
use App\Models\Flights\Office;
use App\Models\Scopes\flightsGo\ClassPriceScope;
use App\Models\Scopes\flightsGo\FromToCityScope;
use App\Models\Scopes\flightsGo\numStopInFlightGo;
use App\Models\Scopes\flightsGo\typeClassScope;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightRound extends Model
{
    use HasFactory;

    protected $table = 'flightsRound';
    protected $fillable = [
        'dateGo', 'takeoffGo', 'landingGo', 'durationGo', 'dateBack',
        'takeoffBack', 'landingBack', 'durationBack', 'capacity'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'flights_round_services',
            'flightRound_id', 'service_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_flight_round',
            'flightRound_id', 'class_id')
            ->withPivot('price', 'capacity');
    }

    public function stops()
    {
        return $this->belongsToMany(stop::class, 'flights_round_stops',
            'flightRound_id', 'stop_id');
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
        return $this->belongsToMany(User::class, 'user_flights_round',
            'flightRound_id', 'user_id')
            ->withPivot('passenger');
    }


    //scopes

    //scope from to city with one month before and after almost
    public function scopeWithinDateRangeAndCities($query, $DateGo, $DateBack, $fromCity, $toCity)
    {
        return FromToCityScope::CityAndDate($query, $DateGo, $DateBack, $fromCity, $toCity);
    }

    //scope for class with person number
    public function scopeWithClass($query, $class, $persons)
    {
        return TypeClassScope::specificClassRound($query, $class, $persons);
    }

    //for type of class
//    public function scopeWithClassPrice($query, $type)
//    {
//        return ClassPriceScope::ClassPrice($query, $type);
//    }

    //for number of stops
    public function scopeWithNumStops($query, $num)
    {
        return numStopInFlightGo::numStop($query, $num);
    }

    //earlier flights late
    public function scopeFlightsPeriod($query, $period)
    {
//        echo $period;
        if ($period == 'early') {
            return $query->orderBy('takeoff', 'desc');
        }
        return $query->orderBy('takeoff', 'asc');
    }

    //scope for range money
    public function scopePriceRange($query, $min, $max, $classId = null)
    {
        return $query->whereHas('classes', function ($q) use ($min, $max, $classId) {
            if ($classId) {

                $q->where('class_id', $classId)
                    ->whereBetween('class_flight_round.price', [$min, $max]);
            } else {
//                echo $min." ".$max;
                $q->where('class_id', 1) // Economy
                ->whereBetween('class_flight_round.price', [$min, $max]);
            }
        });
    }


}
