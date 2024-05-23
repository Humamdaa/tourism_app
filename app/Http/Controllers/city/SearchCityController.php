<?php

namespace App\Http\Controllers\city;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class SearchCityController extends Controller
{
    public function searchCity(Request $request)
    {

        $tr = new TranslateMessages();

        $search = $request->search;
        // Convert all characters to lowercase and then capitalize the first character
       // $search = ucfirst(strtolower($search));

        $city = City::where('name', 'LIKE', "%$search%")->get();
        if ($city->isNotEmpty()) {
            return response()->json([
                'search' => $city,
                'status'=>200], 200);
        }
        return response()->json([
            'message' => $tr->translate('not found city'),
            'status'=>404], 404);
    }
}
