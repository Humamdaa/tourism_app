<?php

namespace App\Models\Scopes\flightsGo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class typeClassScope implements Scope
{

    public static function specificClass($query, $class,$persons)
    {
        return $query->whereHas('classes', function ($query) use ($class,$persons) {
            $query->where('name', $class)
                ->where('class_flight_go.capacity', '>=', $persons);

        })
            ->with(['services', 'office', 'classes' => function ($query) use ($class,$persons) {
                $query->where('name', $class)
                    ->wherePivot('capacity', '>=', $persons);
            }]);
    }

    public static function specificClassRound($query, $class, $persons)
    {
        return $query->whereHas('classes', function ($query) use ($class, $persons) {
            $query->where('name', $class)
                ->where('class_flight_round.capacity', '>=', $persons);
        })
            ->with(['services', 'office', 'classes' => function ($query) use ($class, $persons) {
                $query->where('name', $class)
                    ->wherePivot('capacity', '>=', $persons);
            }]);
    }


    public function apply(Builder $builder, Model $model): void
    {
        //
    }
}
