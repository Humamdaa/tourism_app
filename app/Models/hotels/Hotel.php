<?php

namespace App\Models\hotels;

use App\Models\city;
use App\Models\favorite\FavoriteHotels;
use App\Models\Scopes\hotels\HotelsBookingStatus_PersonsScope;
use App\Models\Scopes\hotels\HotelsCityScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';
    protected $fillable = [
        'name',
        'rate',
        'price',
        'description',
        'latitude',
        'longitude'
    ];

    //relationships
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'hotel_services', 'id_hotel', 'id_service');
    }

    public function comments()
    {
        return $this->hasMany(hotel_comment::class);
    }

    public function photos()
    {
        return $this->hasMany(hotel_photo::class);
    }

//    public function favoriteHotels()
//    {
//        return $this->hasMany(FavoriteHotels::class, 'hotel_id');
//    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'favorite_hotels',
            'hotel_id',
            'user_id');
    }

//*********************************************************************************************************************

    //scopes :

    //2- global dynamic scope to retrieve the hotels in specific city in HotelsCityScope.


//local:
    public function scopeByPersonNum($query, $personNum)
    {
        return HotelsBookingStatus_PersonsScope::scopePersonNum($query, $personNum);
    }

    public function scopeByCityName($query, $cityName)
    {
        return HotelsCityScope::scopeCityName($query, $cityName);
    }

    public function availableRoomsForPersons($numPersons)
    {
        return $this->rooms()->where('person_num', '>=', $numPersons)->where('isBooking', false)->get();
    }


    //1- local dynamic scope :take parameter to apply the condition on the parameter that is passed
    //retrieve hotels based on the population of their associated city (if you want)
    public function scopeByCityPopulation($query, $minPopulation, $maxPopulation)
    {
        return $query->whereHas('city', function ($query) use ($minPopulation, $maxPopulation) {
            $query->whereBetween('population', [$minPopulation, $maxPopulation]);
        });
    }

}

//note :
//The $query->whereHas() method is used to filter the hotels based on the existence of a related city.
// It ensures that only hotels with a related city that meets certain criteria are returned.
//Inside the whereHas closure, another query is applied
// to filter the related city records based on the city name (name column) matching the $cityName parameter
// passed to the scope.
