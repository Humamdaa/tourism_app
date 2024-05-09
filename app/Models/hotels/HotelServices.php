<?php

namespace App\Models\hotels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_service',
        'id_hotel',
    ];
}
