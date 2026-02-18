<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TouristController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- ল্যান্ডিং পেজ রাউটস ---
Route::get('/', function () {
    return view('landing.index');
})->name('landing.index');

// গ্যালারি পেজ (এখান থেকে ডাটাবেসের ছবি শো করবে)
Route::get('/gallery', [GalleryController::class, 'index'])->name('landing.gallery');

Route::get('/credits', function () {
    return view('landing.credits');
})->name('landing.credits');

Route::get('/itinerary', function () {
    return view('landing.itinerary');
})->name('landing.itinerary');

// --- অথেন্টিকেশন রাউটস ---
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// --- ট্যুরিস্ট/স্টুডেন্ট ম্যানেজমেন্ট ---
Route::get('/tourist/create', [TouristController::class, 'create'])->name('tourist.create');
Route::post('/tourist/store', [TouristController::class, 'store'])->name('tourist.store');
Route::get('/tourist/list', [TouristController::class, 'tour_list'])->name('dashboard.tourist');
Route::get('/student/profile/{id}', [TouristController::class, 'showProfile'])->name('tourist.showProfile');
Route::put('/student/update/{id}', [HomeController::class, 'updateStudent'])->name('student.update');
Route::delete('/student/delete/{id}', [HomeController::class, 'deleteStudent'])->name('student.delete');

// --- কোর্স ম্যানেজমেন্ট ---
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'courseWise'])->name('courses.courseWise');

// --- পিডিএফ এবং রিপোর্ট ---
Route::get('/student/profile/pdf/{id}', [HomeController::class, 'downloadPDF'])->name('student.download.pdf');
Route::get('/user/student/profile/{id}', [HomeController::class, 'showStudentProfile'])->name('user.student.profile');
Route::get('/admin/generate-report', [HomeController::class, 'generateAllStudentsReport'])->name('admin.report.download');
Route::get('/student/pdf/{id}', [HomeController::class, 'generateStudentPDF'])->name('tourist.pdf');

// --- অ্যাডমিন গ্যালারি আপলোড (অ্যাডমিন প্যানেলের জন্য) ---
Route::get('/gallery-upload', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery-upload', [GalleryController::class, 'store'])->name('gallery.store');

// --- প্রোফাইল ম্যানেজমেন্ট (লগইন করা ইউজারদের জন্য) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/my-admin-profile', [HomeController::class, 'myAdminProfile'])->name('admin.profile');
    Route::get('/my-user-profile', [HomeController::class, 'myUserProfile'])->name('user.profile');
    Route::post('/profile-update', [HomeController::class, 'updateProfile'])->name('user.profile.update');
});