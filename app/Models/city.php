<?php

namespace App\Models;

use App\Models\hotels\Hotel;
use App\Models\homes\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class city extends Model
{
    use HasFactory;
protected $table = 'cities';
    protected $fillable = [
        'name',
        'population',
        'latitude',
        'longitude'
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
    public function homes()
    {
        return $this->hasMany(Home::class);
    }

}
