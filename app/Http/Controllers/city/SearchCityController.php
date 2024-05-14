<?php

namespace App\Http\Controllers\city;

use App\Http\Controllers\Controller;
use App\Models\city;
use Illuminate\Http\Request;

class SearchCityController extends Controller
{
    public function searchCity(Request $request){
        $search = $request->search;
        $city = City::where('name','LIKE',"%$search%")->get();
        if($city){
            return response()->json(['search'=>$city],200);
        }
        return response()->json(['message'=>'not found city'],404);
    }
}
