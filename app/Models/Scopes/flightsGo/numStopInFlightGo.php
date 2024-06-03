<?php

namespace App\Models\Scopes\flightsGo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class numStopInFlightGo implements Scope
{

    public static function numStop($query, $num)
    {
        if ($num <= 2) {
            return $query->where('NumStops', '=', $num);
        }
        return $query->where('NumStops', '>=', $num);
    }

    public function apply(Builder $builder, Model $model): void
    {
        //
    }
}
