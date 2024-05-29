<?php

namespace App\Models;

use App\Models\Flights\FlightsGo\FlightGo;
use App\Models\hotels\Hotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'name'
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_services', 'id_service', 'id_hotel');
    }

    public function flightsGo()
    {
        return $this->belongsToMany(FlightGo::class, 'flights_go_services', 'service_id', 'flightGo_id');
    }
}
