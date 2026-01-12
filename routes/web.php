<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TouristController;

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tourist/create', [TouristController::class, 'create'])->name('tourist.create');
Route::get('/tourist/list', [TouristController::class, 'tour_list'])->name('tourist.list');
Route::post('/tourist/store', [TouristController::class, 'store'])->name('tourist.store');
