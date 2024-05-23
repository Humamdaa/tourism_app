<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;

class MyHomeBookController extends Controller
{
    public function getMyHomeBooking(Request $request){
        // $user = User::find(2);

        // return $user->homes;
        $user = $request->user();

        //        return $user;

                if ($user) {
                    $all = $user->HomeBookings()->with('home:id,location,space')->get();

                    if ($all) {
                        return response()->json(['data' => $all], 200);
                    }
                    return response()->json(['message' => 'there are no hotel booking for you'], 404);
                }
                return response()->json(['message' => 'the user not found'], 404);
    }

}
