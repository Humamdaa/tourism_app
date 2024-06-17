<?php

namespace App\Services\homes\insideHomePage;

use App\Services\homes\insideHomePage\findHome;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class getOwnerHomeData
{
    public function getHomeOwner(Request $request)
    {
        $tr = new TranslateMessages();

        $temp = new findHome();
        $home = $temp->home($request);
        if ($home) {
            $owner = $home->owner()->first();
            if ($owner) {
                // Assuming 'name' and 'phone_number' (or similar) are attributes of the owner model
                $ownerName = $owner->name;
                $ownerNumber = $owner->phone; // Replace 'phone_number' with the actual column name for the owner's phone number in your database

                // Return both the name and number in an array
                return [
                    'ownerName' => $ownerName,
                    'ownerNumber' => $ownerNumber
                ];
            } else {
                return ['message' => $tr->translate("not found owner for this home")];
            }
        } else {
            return ['message' => $tr->translate('home not found')];
        }
    }
}
