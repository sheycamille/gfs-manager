<?php

namespace App\Http\Controllers\Updates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Utility;

class GeneralUpdatesController extends Controller
{
    public function login($lang = ''){
        if($lang == '')
        {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        $settings = Utility::settings();

        return view('updates.login', compact('lang','settings'));
    }

    public function otpVerification($lang = ''){
        if($lang == '')
        {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        $settings = Utility::settings();

        return view('updates.otp_verification', compact('lang','settings'));
    }
}
