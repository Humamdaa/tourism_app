<?php

namespace App\Models\hotels;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel_comment extends Model
{
    use HasFactory;
    protected $table = 'hotel_comments';
    protected $fillable = ['comment', 'rate', 'user_id', 'hotel_id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
