<?php

namespace App\Http\Controllers\Translate;

use App\Http\Controllers\Controller;
use App\Services\translate\getAllAvalilabeLanguges;
use App\Services\translate\SetLanguage;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;

class translateController extends Controller
{

    public function setLang(Request $request)
    {
        $temp = new SetLanguage();
        return $temp->setLanguage($request);
    }

    public function getAllLang()
    {
        $temp = new getAllAvalilabeLanguges();
        return $temp->allLanguages();
    }

    public function translate($message)
    {
        $temp = new TranslateMessages();
        return $temp->translate($message);
    }
}
