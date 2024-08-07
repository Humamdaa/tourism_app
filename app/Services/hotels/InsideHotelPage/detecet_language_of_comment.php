<?php

namespace App\Services\hotels\InsideHotelPage;

use Stichoza\GoogleTranslate\GoogleTranslate;

class detecet_language_of_comment
{
    function TranslateCommentToStore($message, $targetLanguage = 'en')
    {
        $translatedMessage = GoogleTranslate::trans($message, 'en');
        return $translatedMessage;
        return $message;

    }

}
