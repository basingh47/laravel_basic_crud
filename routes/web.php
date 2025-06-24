<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.index');
});

Route::get('/create-post', function () {
    return view('admin.pages.create-post');
})->name('create-post');


Route::get('/list-posts', function () {
    return view('admin.pages.list-posts');
})->name('list-posts');

Route::get('/tags', function () {
    return view('admin.pages.tags');
})->name('tags');

Route::get('/settings', function () {
    return view('admin.pages.settings');
})->name('settings');


Route::get('/registration', function () {
    return view('admin.auth.registration');
});

Route::resource('categories',CategoryController::class);