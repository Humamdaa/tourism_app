<?php

namespace App\Models\favorite;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteHotels extends Model
{
    use HasFactory;
    protected $table= 'favorite_hotels';
    protected $fillable = ['user_id', 'hotel_id']; // Define the columns that are mass assignable

}
