<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/registration', [RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store', [RegistrationController::class,'store'])->name('registration_store');


Route::get('/forgot', [ForgotPasswordController::class,'forgot'])->name('forgotpassword');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login_check');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');





Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard')->middleware('auth');
