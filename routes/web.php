<?php

use Illuminate\Support\Facades\Route;

Route::get('/registration', function () {
    return view('admin.auth.registration');
});


Route::get('/login', function () {
    return view('admin.auth.login');
});

