<?php

namespace App\Providers;

use App\Models\Tourist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('totalStudents', Tourist::count());
            $view->with('activeStudents', Tourist::where('status', 'active')->count());
            $view->with('pendingStudents', Tourist::where('status', 'pending')->count()); 
            $view->with('rejectedStudents', Tourist::where('status', 'rejected')->count()); 

        });  
    }
}
