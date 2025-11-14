<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalUsers' => User::count(),
            'totalStudents' => User::role('student')->count(),
            'totalAdmins' => User::role('admin')->count(),
            'totalCourses' => Course::count(),
            'publishedCourses' => Course::where('status', 'published')->count(),
            'draftCourses' => Course::where('status', 'draft')->count(),
            'newUsersThisWeek' => User::where('created_at', '>=', Carbon::now()->startOfWeek())->count(),
            'newUsersThisMonth' => User::where('created_at', '>=', Carbon::now()->startOfMonth())->count(),
        ];

        $chartData = [
            'userSignups' => $this->getUserSignupData(),
            'activeUsers' => $this->getActiveUsersData(),
        ];

        $recentUsers = User::with('profile')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'chartData', 'recentUsers'));
    }

    private function getUserSignupData()
    {
        $last7Days = collect(range(6, 0))->map(function ($days) {
            $date = Carbon::now()->subDays($days);
            return [
                'date' => $date->format('D'),
                'count' => User::whereDate('created_at', $date->format('Y-m-d'))->count(),
            ];
        });

        return [
            'labels' => $last7Days->pluck('date')->toArray(),
            'data' => $last7Days->pluck('count')->toArray(),
        ];
    }

    private function getActiveUsersData()
    {
        // Last 7 days active users (logged in)
        $last7Days = collect(range(6, 0))->map(function ($days) {
            $date = Carbon::now()->subDays($days);
            return [
                'date' => $date->format('D'),
                'count' => DB::table('profiles')
                    ->whereDate('last_login', $date->format('Y-m-d'))
                    ->count(),
            ];
        });

        return [
            'labels' => $last7Days->pluck('date')->toArray(),
            'data' => $last7Days->pluck('count')->toArray(),
        ];
    }
}