<?php

namespace App\Models\hotels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_services', 'id_service', 'id_hotel');
    }
}
