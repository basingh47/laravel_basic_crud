<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('dashboard');


Route::get('/tags', function () {
    return view('admin.pages.tags');
})->name('tags');

Route::get('/settings', function () {
    return view('admin.pages.settings');
})->name('settings');


Route::resource('categories',CategoryController::class);
Route::resource('post',PostController::class);
