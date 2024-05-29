<?php

namespace App\Models\homes;

use App\Models\homes\Feature;
use App\Models\city;
use App\Models\homes\B;
use App\Models\User;
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

    public function fetures()
    {
        return $this->belongsToMany(Feature::class, 'home_feature_pivot', 'home_id', 'feature_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'book_home_user_pivot',
            'home_id',
            'user_id'
        );
    }

    public function homeBookings()
    {
        return $this->hasMany(BookHome::class, 'home_id');
    }
}
