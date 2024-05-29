<?php

namespace App\Models\homes;


use App\Models\homes\Home;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHome extends Model
{

    protected $table = 'book_home_user_pivot';


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function home()
    {
        return $this->belongsTo(Home::class, 'home_id');
    }

}
