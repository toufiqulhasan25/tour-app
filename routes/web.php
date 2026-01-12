<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TouristController;

Route::get('/', function () {
    return view('landing.index');
})->name('landing.index');
Route::get('/gallery', function () {
    return view('landing.gallery');
})->name('landing.gallery');
Route::get('/credits', function () {
    return view('landing.credits');
})->name('landing.credits');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tourist/create', [TouristController::class, 'create'])->name('tourist.create');
Route::get('/student/profile/{id}', [TouristController::class, 'showProfile'])->name('tourist.showProfile');
Route::get('/tourist/list', [TouristController::class, 'tour_list'])->name('tourist.list');
Route::post('/tourist/store', [TouristController::class, 'store'])->name('tourist.store');
Route::post('/student/update/{id}', [HomeController::class, 'updateStudent'])->name('student.update');



Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'courseWise'])->name('courses.courseWise');