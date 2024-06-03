<?php

namespace App\Services\homes\showHomes;

use App\Http\Controllers\currency\convertCurrency;

class changePriceOfHome
{
    //the array that must be passed contains price key

    public function changePrice($arr)
    {

        $i = 0;
        $result = [];
        $temp = new convertCurrency();

        foreach ($arr["homes"] as $a) {
            $res = $temp->convert($a['monthly_rent']);
            $a['monthly_rent'] = $res;
            $result [$i] = $a;
            $i++;
        }
        return $result;
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
        return $result;
    }
}
