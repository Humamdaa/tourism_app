<?php

namespace App\Models\homes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_features extends Model
{
    use HasFactory;
    protected $table= 'home_feature';
    protected $fillable = ['feature_id', 'home_id']; // Define the columns that are mass assignable
}
