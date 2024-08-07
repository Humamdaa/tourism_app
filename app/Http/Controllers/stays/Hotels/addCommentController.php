<?php

namespace App\Http\Controllers\stays\Hotels;

use App\Events\newCommentSent;
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
            $comment = hotel_comment::create([
                'comment' => $com,
                'rate' => $rate,
                'user_id' => $user->id,
                'hotel_id' => $hotel_id
            ]);



            //todo sned broadcast event to pusher and send notification to on signal services
            $this->sendNotificationToOther($comment);

            return response()->json([
                'message' => $tr->translate('your comment is added'),
                'status' => 200], 200);

        }
        return response()->json([
            'message' => $tr->translate('user not found'),
            'status' => 404], 404);
    }

    //send notification to other users
    private function sendNotificationToOther(hotel_comment $comment): void
    {
//        $comment_id = $comment->id;

        broadcast(new newCommentSent($comment))->toOthers();

        $user = auth()->user();
        $user->sendNewMessageNotification([
            'messageData' => [
                'message' => $comment->comment
            ]
        ]);
//        $userId = $user->id;
//        where('id',$userId)->
    }
}
