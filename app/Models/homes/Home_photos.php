<?php

namespace App\Models\homes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_photos extends Model
{

    use HasFactory;
    protected $table = 'home_photos';

    public function hotel()
    {
        return $this->belongsTo(Home::class);
    }
}
