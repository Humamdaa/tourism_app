<?php
namespace App\Models\Scopes\homes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;

class HomesBookingStatus_Space_Rooms_Scope implements Scope
{
    public static function scopeBySpace(Builder $query, $minSpace,$maxSpace)
    {
        return $query->where('space', '>=', $minSpace)
        ->where('space', '<=', $maxSpace)->with('homeBookings');
    }
    public static function scopeByRoomsNum(Builder $query, $rooms)
    {
        return $query->where('rooms', '>=', $rooms);
    }



    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
    }
}

