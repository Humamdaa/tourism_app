<?php

namespace App\Services\homes;
use App\Models\favorite\FavoriteHomes;
use Illuminate\Http\Request;
use App\Services\translate\TranslateMessages;
use Illuminate\Support\Facades\Validator;
use App\Services\homes\addHomeToFavorite;
use App\Services\homes\removeHomeFromFavorite;

class changeHomeFavorite
{
    public function change(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'home_id' => 'required',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 404
            ], 404); // You can use 422 if you prefer
        }

        $user = $request->user(); // Access authenticated user object (if middleware is applied)
        if (!$user) {
            return response()->json([
                'message' => $tr->translate('User is not authenticated'),
                'status' => 404
            ], 404); //401
        }

        $userId = $user->id; // Access authenticated user's ID

        $homeId = $request->home_id; // Assuming you are getting the home ID from the request

        if ($userId && $homeId) {
            // Check if the user already has this home in favorites to prevent duplication
            if (!FavoriteHomes::where('user_id', $userId)->where('home_id', $homeId)->exists()) {

                $add = new addHomeToFavorite();
                return $add->addHomeToFavorite($homeId, $userId);
            }
        }
        $remove = new removeHomeFromFavorite();
        return $remove->removeHomeFromFavorite($user, $homeId);
    }
}
