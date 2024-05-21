<?php

namespace App\Services\translate;


use Illuminate\Http\Request;

class SetLanguage
{
    public function setLanguage($request)
    {
        session()->put('lang', $request->lang);
        $message = "the language changed successfully to";
        $tr = new TranslateMessages();
        return response()->json(['message' => $tr->translate($message) . ": " . session('lang')], 200);
    }
}
