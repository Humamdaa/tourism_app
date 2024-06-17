<?php

namespace App\Models\homes;

use App\Models\homes\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'features';

    protected $fillable = [
        'name'
    ];

    public function homes()
    {
        return $this->belongsToMany(Home::class, 'home_feature_pivot', "home_id", "feature_id");
    }
}
