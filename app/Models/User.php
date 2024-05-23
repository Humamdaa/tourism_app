<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\favorite\FavoriteHotels;
use App\Models\homes\Feature;
use App\Models\Flights\FlightsGo\FlightGo;
use App\Models\hotels\Booking;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\Hotel;
use App\Models\homes\Home;
use App\Models\homes\BookHome;
use App\Models\hotels\hotel_comment;
use App\Models\hotels\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'google_id',
        'remember_token',
        'reset_code',
        'verification_code',
        'verification_code_expires_at',
        'verified_account'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function createRememberToken()
    {
        $this->remember_token = Str::random(60);
        $this->save();
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'book_room_hotel', 'id_user', 'id_room')
            ->withPivot('start', 'end', 'id_hotel'); // If you need to access additional pivot columns
    }

    public function bookings()
    {
        return $this->hasMany(BookRoomHotel::class, 'id_user');
    }
    public function homeBookings()
    {
        return $this->hasMany(BookHome::class, 'user_id');
    }


//    public function favoriteHotels()
//    {
//        return $this->hasMany(FavoriteHotels::class, 'user_id');
//    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'favorite_hotels',
            'user_id',
            'hotel_id');
    }

    public function comments()
    {
        return $this->hasMany(hotel_comment::class);
    }

    public function homes(){
        return $this->belongsToMany(
            Home::class,
            'book_home_user_pivot',
            'home_id',
            'user_id'
        );
    }

    public function flightsGo()
    {
        return $this->belongsToMany(FlightGo::class, 'user_flights_go', 'user_id', 'flightGo_id')
            ->withPivot('passenger');
    }
}
