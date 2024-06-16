<?php

namespace App\Models\Scopes\flightsGo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ClassPriceScope implements Scope
{

    public static function ClassPrice($query,$type)
    {
        return $query->join('class_flight_go', 'flightsgo.id', '=', 'class_flight_go.flightGo_id')
            ->select('flightsgo.*') // Ensure we select only the flight columns to avoid conflicts
            ->orderBy('class_flight_go.price', $type)
            ->distinct();
    }
    public function apply(Builder $builder, Model $model): void
    {
        //
    }
}
