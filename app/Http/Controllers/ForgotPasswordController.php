<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgot(Request $request)
    {
        return view("admin.auth.forgotpassword");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $email = $request->input('email');

        Mail::raw('This is a test email via SMTP.', function ($message) {
            $message->to('basingh47@gmail.com')
                ->subject('SMTP Test');
        });

        dd("mail sent");


    }
}
