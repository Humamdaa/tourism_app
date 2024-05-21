<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Http\Controllers\Controller;
use App\Models\hotels\BookRoomHotel;
use App\Models\hotels\hotel_comment;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class addCommentController extends Controller
{
    public function comment(Request $request)
    {
        $tr = new TranslateMessages();

        $user = $request->user();
        $com = $request->comment;
        $hotel_id = $request->hotel_id;
        $rate = $request->rate;
        if ($user) {
            hotel_comment::create([
                'comment' => $com,
                'rate' => $rate,
                'user_id' => $user->id,
                'hotel_id' => $hotel_id
            ]);
            return response()->json([
                'message' => $tr->translate('your comment is added'),
                'status' => 200], 200);
        }
        return response()->json([
            'message' => $tr->translate('user not found'),
            'status' => 404], 404);
    }
}
