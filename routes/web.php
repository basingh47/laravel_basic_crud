<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\OAuthController;

Route::get('/registration', [RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store', [RegistrationController::class,'store'])->name('registration_store');


Route::get('/forgot', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request'); 
Route::post('/forgot/send-otp', [ForgotPasswordController::class, 'sendOtp'])->name('password.email'); 


Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login_check');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/forgot/otp', [ForgotPasswordController::class,'showOtpForm'])->name('password.otp.show');
Route::post('/forgot/otp/verify', [ForgotPasswordController::class,'verifyOtp'])->name('password.otp.verify');

Route::get('/update', [ForgotPasswordController::class,'updatePasswordForm'])->name('password.update.show');
Route::post('/update/password', [ForgotPasswordController::class,'updatePassword'])->name('password.update');

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard')->middleware('auth');




Route::get('/auth/google', [OAuthController::class, 'redirectToGoogle'])->name('oauth.google');
Route::get('/auth/google/callback', [OAuthController::class, 'handleGoogleCallback']);
