<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistrationRequest;
class RegistrationController extends Controller
{
    public function index()
    {
        return view("admin.auth.registration");
    }

    public function store(RegistrationRequest $request)
    {  
        $user = User::create(
            ['username'=>$request->validated('userName'),'email'=>$request->validated('email'),'password'=>$request->validated('password')]);
        return redirect()->route("login")->with('success', 'Registration successful!');
    }
}
