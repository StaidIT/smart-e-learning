<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyOTP extends Controller
{
    public function verify(Request $request){
        $otp = $request->validate([
            'otp1' => 'required',
            'otp2' => 'required',
            'otp3' => 'required',
            'otp4' => 'required',
            'otp5' => 'required',
            'otp6' => 'required',
        ]);

        $otp_code = $otp['otp1'].$otp['otp2'].$otp['otp3'].$otp['otp4'].$otp['otp5'].$otp['otp6'];
        $otp_session = session('otp_session');

        $user = User::findorFail($otp_session['user_id']);

        if($otp_code === $user->otp_verification){
            if(Carbon::now()->lessThan($user->otp_expiration)){
                $user->update(['email_verified_at' => Carbon::now(), 'otp_verification'=> null, 'otp_expiration'=>null]);
                session()->forget('otp_session');
                Auth::login($user);
                return redirect()->route('home');
            }else{
                return back()->withErrors([
                    'expired_otp' => 'Your OTP has been Expired! Click Resend for new OTP.'
                ]);
            }
        }

    }
}
