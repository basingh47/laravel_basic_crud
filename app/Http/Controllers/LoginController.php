<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
class LoginController extends Controller
{
   public function index(Request $request)
   {
      return view("admin.auth.login");
   }

   public function login(Request $request)
   {
      $request->validate([
         "email"=> "required|email",
         "password"=> "required"
      ]);

      $credentials = $request->only("email", "password");
      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();

         return redirect()->route('dashboard');
      }

      return back()->withErrors(['email'=>'Invalid credentials.'])->onlyInput('email');
   }
}
