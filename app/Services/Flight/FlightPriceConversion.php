<?php

namespace App\Services\Flight;

use App\Http\Controllers\currency\convertCurrency;

class flightPriceConversion
{

    public function change($flights){
        $temp = new convertCurrency();

        foreach ($flights as &$fl) {
            foreach ($fl['classes'] as &$class) {
                $var = $temp->convert($class['pivot']['price']);
                $class['pivot']['price'] = $var;
            }
        }
        return $flights;
    }

}
