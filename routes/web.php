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
Route::get('/itinerary', function () {
    return view('landing.itinerary');
})->name('landing.itinerary');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tourist/create', [TouristController::class, 'create'])->name('tourist.create');
Route::get('/student/profile/{id}', [TouristController::class, 'showProfile'])->name('tourist.showProfile');
Route::get('/tourist/list', [TouristController::class, 'tour_list'])->name('dashboard.tourist');
Route::post('/tourist/store', [TouristController::class, 'store'])->name('tourist.store');
Route::put('/student/update/{id}', [HomeController::class, 'updateStudent'])->name('student.update');



Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'courseWise'])->name('courses.courseWise');

Route::get('/student/profile/pdf/{id}', [HomeController::class, 'downloadPDF'])->name('student.download.pdf');
Route::get('/user/student/profile/{id}', [HomeController::class, 'showStudentProfile'])->name('user.student.profile');

Route::get('/admin/generate-report', [HomeController::class, 'generateAllStudentsReport'])->name('admin.report.download');

Route::get('/student/pdf/{id}', [HomeController::class, 'generateStudentPDF'])->name('tourist.pdf');



Route::middleware(['auth'])->group(function () {
    Route::get('/my-admin-profile', [HomeController::class, 'myAdminProfile'])->name('admin.profile');
    Route::get('/my-user-profile', [HomeController::class, 'myUserProfile'])->name('user.profile');
    Route::post('/profile-update', [HomeController::class, 'updateProfile'])->name('user.profile.update');
});

Route::delete('/student/delete/{id}', [HomeController::class, 'deleteStudent'])->name('student.delete');