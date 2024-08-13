<?php

namespace App\Http\Controllers\FlightGo;

use App\Http\Controllers\Controller;
use App\Services\Flight\FlightsGo\cancelBookFlightGo;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cancelBookController extends Controller
{
    public function cancelFlightGo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'flightGo_id' => 'required',
            'passenger'=>'required'
        ]);

        $tr = new TranslateMessages();

        if($validator->fails()){
            return response([
                'message'=>$tr->translate($validator->messages())
            ]);
        }

        $cancel = new cancelBookFlightGo();
        return $cancel->cancelBook($request);
    }
}
