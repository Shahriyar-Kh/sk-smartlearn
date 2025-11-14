<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Share authenticated user across all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('authUser', Auth::user());
            }
        });

        // Share common data for student views
        View::composer('student.*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $view->with([
                    'userProfile' => $user->profile,
                    'userStats' => [
                        'courses' => 0, // Will be updated in Phase 2
                        'hours' => $user->profile->total_study_hours,
                        'streak' => $user->profile->streak_count,
                    ]
                ]);
            }
        });
    }
}