<?php

namespace App\Services\hotels\showHotels;

use App\Http\Controllers\currency\convertCurrency;

class changePriceOfHotel
{
    //the array that must be passed contains price key

    public function changePrice($arr)
    {
        $i = 0;
        $result = [];
        $temp = new convertCurrency();

        foreach ($arr as $a) {
            $res = $temp->convert($a['price']);
            $a['price'] = $res;
            $result [$i] = $a;
            $i++;
        }
        return ['hotels'=>$result];
    }

    public function changePriceInBooking($arr)
    {

        $i = 0;
        $result = [];
        $temp = new convertCurrency();

        foreach ($arr as $a) {
            $resTotal = $temp->convert($a['total']);
            $a['total'] = $resTotal;

            $resPrice = $temp->convert($a['hotel']['price']);

            $a['hotel']['price'] = $resPrice;
            $result [$i] = $a;
            $i++;
        }
        return ['hotels'=>$result];
    }
}
