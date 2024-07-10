<?php

namespace App\Models\Scopes\flightsGo;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FromToCityScope implements Scope
{

//    for go flight , there is one date
    public static  function fromToCity(Builder $query, $Date, $fromCity, $toCity)
    {
        //take flights before and after one month the date that user is sent

        $date = Carbon::parse($Date);
        $beforeDate = $date->copy()->subMonth();
        $afterDate = $date->copy()->addMonth();
        $now = Carbon::now();

        if ($beforeDate->lt($now)) {
            $difference = $date->diffInDays($now);
            $beforeDate = $date->subDays($difference);
        }

        return $query->whereBetween('date', [$beforeDate, $afterDate])
            ->whereHas('fromCity', function ($query) use ($fromCity) {
                $query->where('name', $fromCity);
            })
            ->whereHas('toCity', function ($query) use ($toCity) {
                $query->where('name', $toCity);
            });
    }


    public static  function CityAndDate(Builder $query, $dateGo,$dateBack, $fromCity, $toCity)
    {
        //take flights before and after one month the date that user is sent
        return $query->whereHas('fromCity', function($q) use ($fromCity) {
            $q->where('name', $fromCity);
        })
            ->whereHas('toCity', function($q) use ($toCity) {
                $q->where('name', $toCity);
            })
            ->where('dateGo', $dateGo)
            ->where('dateBack', $dateBack);
    }


    public function apply(Builder $builder, Model $model): void
    {

    }
}
