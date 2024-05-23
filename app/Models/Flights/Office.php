<?php

namespace App\Models\Flights;

use App\Models\Flights\FlightsGo\FlightGo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $table = 'offices';
    protected $fillable = ['name'];

    public function FlightsGo(){
        return $this->hasMany(FlightGo::class);
    }
}
