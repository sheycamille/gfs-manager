<?php

namespace App\Http\Controllers\Updates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GeneralUpdatesController extends Controller
{
    private function check_if_verification_needed(){
        $user = Auth::user();
        if(!session('otp_verification_pending')){
            if($user->type =='company' || $user->type =='client')
            {
                return redirect()->intended(RouteServiceProvider::HOME);

            }
            else
            {
                return redirect()->intended(RouteServiceProvider::EMPHOME);
            }
        }
    }
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
        $this->check_if_verification_needed();
        if($lang == '')
        {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        $settings = Utility::settings();

        return view('updates.otp_verification', compact('lang','settings'));
    }

    public function verify_otp(Request $request){
        $this->check_if_verification_needed();
        $validated = $request->validate([
            'otp_code' => 'required',
        ]);

        $user = Auth::user();

 
        
        if($user->otp != $validated['otp_code']){
            return redirect()->back()->with('error', "Invalid otp code");
        }

        
        // Check if it has expired
        if($user->otp_expires_at < now()){
            return redirect()->back()->with('error', "Otp code has expired");
        }

        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        session(['otp_verification_pending' => false]);

        if($user->type =='company' || $user->type =='client')
        {
            return redirect()->intended(RouteServiceProvider::HOME);

        }
        else
        {
            return redirect()->intended(RouteServiceProvider::EMPHOME);
        }
    }


    public function resend_otp(Request $request){
        $this->check_if_verification_needed();
        $user = Auth::user();

        $otp = rand(100000, 999999); // Generate 6 digit random number
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10); // Set expiry time
        $user->save();

        // send mail to user and sms

        return redirect()->back()->with('success', "A new opt code has been sent to your email and phone number");
    }
}
