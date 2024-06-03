<?php

namespace App\Models\favorite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteHomes extends Model
{
    use HasFactory;
    protected $table= 'favorite_homes';
    protected $fillable = ['user_id', 'home_id']; // Define the columns that are mass assignable
}
