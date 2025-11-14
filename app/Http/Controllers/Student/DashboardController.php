<?php
// app/Http/Controllers/Student/DashboardController.php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;
        
        // Update last login and streak
        $profile->updateStreak();
        $user->updateLastLogin();

        // Get dashboard data
        $data = [
            'totalCourses' => 0, // Will be implemented in Phase 2
            'completedCourses' => 0,
            'totalStudyHours' => $profile->total_study_hours,
            'currentStreak' => $profile->streak_count,
            'weeklyStudyData' => $this->getWeeklyStudyData(),
            'recentActivity' => [], // Will be implemented later
            'upcomingTasks' => [], // Will be implemented later
        ];

        return view('student.dashboard', compact('user', 'profile', 'data'));
    }

    private function getWeeklyStudyData()
    {
        // Dummy data for now - will be replaced with actual data in Phase 2
        return [
            'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            'data' => [2, 3, 1, 4, 2, 5, 3],
        ];
    }
}