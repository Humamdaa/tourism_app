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
        'persons',
        'id_room',
        'id_hotel',
        'id_user',
        'total',
        'taken'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }


}
