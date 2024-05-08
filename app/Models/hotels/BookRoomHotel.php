<?php

namespace App\Models\hotels;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRoomHotel extends Model
{
    use HasFactory;

    protected $table = 'book_room_hotel';
    protected $fillable = [
        'start',
        'end',
        'id_room',
        'id_hotel',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
}
