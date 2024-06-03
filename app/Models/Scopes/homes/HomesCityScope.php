<?php

namespace App\Models\Scopes\homes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;

class HomesCityScope implements Scope
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function scopeCityName(Builder $query, $cityName)
    {
        if ($cityName) {
            return $query->whereHas('city', function ($query) use ($cityName) {
                $query->where('name', $cityName);
            });
        }
        return $query;
    }

    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
    }
}
