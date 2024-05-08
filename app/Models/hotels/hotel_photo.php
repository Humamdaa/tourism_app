<?php

namespace App\Models\hotels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel_photo extends Model
{
    use HasFactory;
    protected $table = 'hotel_photos';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
