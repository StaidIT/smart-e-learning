<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Services\MailerService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login(Request $request, MailerService $mailerService){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->email_verified_at === null) {
                $otp_code = rand(100009, 999999);

                $user->update([
                    'otp_verification' => $otp_code,
                    'otp_expiration' => Carbon::now()->addMinutes(10)
                ]);

                session([
                    'otp_session' => [
                        'email' => $user->email,
                        'user_id' => $user->id
                    ]
                ]);

                $mailerService->sendMail(
                    $user->email,
                    $user->name,
                    $otp_code
                );

                Auth::logout();

                return redirect()->route('account_verification');
            }

            if ($user->role === 'Admin') {
                return redirect()->route('dashboard_page');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'login' => 'Invalid Credentials'
        ]);
    }

    

}
