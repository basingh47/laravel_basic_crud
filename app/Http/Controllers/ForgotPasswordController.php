<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function  forgot(Request $request)
    {
        return view("admin.auth.forgotpassword");
    }

    public function resetPassword(Request $request)
    {
        dd('reset');
    }
}
