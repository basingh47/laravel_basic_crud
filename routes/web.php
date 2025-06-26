<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

Route::get('/registration', [RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store', [RegistrationController::class,'store'])->name('registration_store');


Route::get('/login', [LoginController::class,'index'])->name('login');

