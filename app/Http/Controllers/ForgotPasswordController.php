<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ResetPasswordOtpMail;



class ForgotPasswordController extends Controller
{
    public function showForgotForm(Request $request)
    {
        return view("admin.auth.forgotpassword");
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $email = $request->input('email');

        $otp = rand(1000, 9999);

        session([
            'password_reset_email' => $email,
            'password_reset_otp' => $otp,
        ]);

        Log::info("OTP for {$email}: {$otp}");

        Mail::to($email)->send(new ResetPasswordOtpMail($otp));

        // Mail::raw('This is a test email via SMTP.', function ($message) {
        //     $message->to('basingh47@gmail.com')
        //         ->subject('SMTP Test');
        // });


        return redirect()->route('password.otp.show')->with('success', 'Email is Send with OTP');
    }

    public function showOtpForm(Request $request)
    {
        return view('admin.auth.otp');
    }

     public function verifyOtp(Request $request)
     {
            $request->validate([
               'otp' => 'required|digits:4'
            ]);
            $otp=$request->input('otp');
            if($otp == session('password_reset_otp'))
            {
               return redirect()->route('password.update.show');
            }
            // else
            // {
            //     return redirect()->route();
            // }
     }

    public function updatePasswordForm(Request $request)
    {
        return view('admin.auth.resetpassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:2|confirmed',
        ]);
        $email=session('password_reset_email');

        $user=User::where('email',$email)->first();
        $user->password=$request->password;
        $user->save();
        // Clear the session
        session()->forget(['password_reset_email','password_reset_otp']);
        return redirect()->route('login')->with('success', 'Password Rest');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    }
}
