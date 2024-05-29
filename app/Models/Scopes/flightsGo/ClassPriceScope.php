<?php

namespace App\Models\Scopes\flightsGo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ClassPriceScope implements Scope
{

    public static function ClassPrice(){

    }
    public function apply(Builder $builder, Model $model): void
    {
        //
    }
}
