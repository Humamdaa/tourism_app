<?php

namespace App\Services\translate;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Session;

class TranslateMessages
{

    public function translate($message)
    {

        // Check if 'lang' key exists in the session
        if (!session()->has('lang')) {
            // If 'lang' key doesn't exist, set it to 'en'
            session(['lang' => 'en']);
        }
        $lang = session('lang');

        if ($lang == 'en') {
            return $message;
        } else {
            // Translate the message
            $translatedMessage = GoogleTranslate::trans($message, $lang, 'en');
            return $translatedMessage;
        }
    }



}
