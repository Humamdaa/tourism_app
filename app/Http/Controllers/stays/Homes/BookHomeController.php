<?php

namespace App\Http\Controllers\stays\Homes;

use App\Http\Controllers\Controller;
use App\Services\homes\insideHomePage\findHome;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Validator;

class BookHomeController extends Controller
{
    public function bookHome(Request $request)
    {
        $tr = new TranslateMessages();

        $user = $request->user();
        $homeId = $request->hotel_id;

        $validator = Validator::make($request->all(), [
            'start' => 'required|date',
            'months' => 'required|integer|min:1',
        ]);

        $start = $request->start;
        $start = Carbon::createFromFormat('Y-m-d', $request->start);
        $months = $request->months;
        $end = $start->copy()->addDays(30 * $months);

        $temp = new findHome();
        $home = $temp->findHome($request->home_id);
        $total = $months * $home->monthly_rent;
        //check if his money is enough
        if (($total > $user->money)) {
            $message = "You do not have enough money,";
            $message .= "Your money is $user->money,";
            $message .= "Monthly rental price of the house is $home->monthly_rent ,";
            $message .= " The total price is $total.";
            return response()->json([
                'message' => $tr->translate($message)
            ]);
        }
    }
}
