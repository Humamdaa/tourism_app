<?php

namespace App\Models\homes;

use App\Models\homes\Feature;
use App\Models\city;
use App\Models\homes\B;
use App\Models\hotels\hotel_photo;
use App\Models\Scopes\homes\HomesBookingStatus_Space_Rooms_Scope;
use App\Models\User;
use App\Models\Scopes\homes\HomesCityScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = [
        'space', 'location', 'description', 'monthly_rent', 'person_num', 'rooms', 'baths'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'home_feature_pivot', 'home_id', 'feature_id');
    }

    public function photos()
    {
        return $this->hasMany(Home_photos::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,"id");
    }
    // public function users()
    // {
    //     return $this->belongsToMany(
    //         User::class,
    //         'book_home_user_pivot',
    //         'home_id',
    //         'user_id'
    //     );
    // }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'favorite_homes',
            'home_id',
            'user_id'
        );
    }

    public function homeBookings()
    {
        return $this->hasMany(BookHome::class, 'home_id');
    }


    public function scopeByCityName($query, $cityName)
    {
        return HomesCityScope::scopeCityName($query, $cityName);
    }
    public function scopeBySpace($query, $minSpace, $maxSpace)
    {
        return HomesBookingStatus_Space_Rooms_Scope::scopeBySpace($query, $minSpace, $maxSpace);
    }
    public function scopeByRoomsNum($query, $rooms)
    {
        return HomesBookingStatus_Space_Rooms_Scope::scopeByRoomsNum($query, $rooms);
    }
}
