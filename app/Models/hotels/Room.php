<?php

namespace App\Models\hotels;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
protected $table = 'rooms';
    protected $fillable = [
        'person_num',
        'hotel_id',
        'isBooking'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_room_hotel', 'id_room', 'id_user')
            ->withPivot('start', 'end','id_hotel'); // If you need to access additional pivot columns
    }

    public function bookings()
    {
        return $this->hasMany(BookRoomHotel::class, 'id_room');
    }

}
