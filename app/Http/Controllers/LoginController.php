<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
   public function index(Request $request)
   {
      return view("admin.auth.login");
   }

   public function login(LoginRequest $request)
   {
      $credentials = $request->only("email", "password");
      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();
         return redirect()->route('dashboard');
      }
      return redirect()->back()->withErrors(['email'=>'Invalid credentials.'])->onlyInput('email');
   }


   public function logout(Request $request)
   {
      Auth::logout();
      return redirect()->route('login')->with('message','logout sucess');
   }
}
