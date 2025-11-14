{{-- resources/views/student/dashboard.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
        {{-- Header --}}
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">👋 Welcome back, {{ $user->name }}!</h1>
                        <p class="mt-1 text-gray-600">Let's continue your learning journey</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Study Streak</p>
                            <p class="text-2xl font-bold text-sky-600">🔥 {{ $profile->streak_count }} days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Quick Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                {{-- Total Courses --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Courses</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $data['totalCourses'] }}</p>
                        </div>
                        <div class="bg-sky-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Study Hours --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Study Hours</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $data['totalStudyHours'] }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Completed Courses --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Completed</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $data['completedCourses'] }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Current Streak --}}
                <div class="bg-gradient-to-br from-orange-400 to-red-500 rounded-xl shadow-sm p-6 text-white hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-orange-100">Current Streak</p>
                            <p class="text-3xl font-bold mt-2">{{ $data['currentStreak'] }} days</p>
                        </div>
                        <div class="text-4xl">🔥</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Today's Plan --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900">📅 Today's Study Plan</h2>
                            <span class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</span>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex items-center p-4 bg-sky-50 rounded-lg border border-sky-100">
                                <input type="checkbox" class="w-5 h-5 text-sky-600 rounded">
                                <div class="ml-3 flex-1">
                                    <p class="font-medium text-gray-900">Complete HTML Chapter 3</p>
                                    <p class="text-sm text-gray-600">Web Development Course • 45 mins</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                                <input type="checkbox" class="w-5 h-5 text-sky-600 rounded">
                                <div class="ml-3 flex-1">
                                    <p class="font-medium text-gray-900">Practice CSS Flexbox</p>
                                    <p class="text-sm text-gray-600">Frontend Design • 30 mins</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                                <input type="checkbox" class="w-5 h-5 text-sky-600 rounded">
                                <div class="ml-3 flex-1">
                                    <p class="font-medium text-gray-900">Review JavaScript Basics</p>
                                    <p class="text-sm text-gray-600">Programming Fundamentals • 1 hour</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-600">Daily Progress</span>
                                <span class="font-medium text-sky-600">0 / 3 completed</span>
                            </div>
                            <div class="mt-2 w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-sky-600 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Active Courses --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900">📚 My Courses</h2>
                            <a href="#" class="text-sm text-sky-600 hover:underline">View All</a>
                        </div>
                        
                        <div class="text-center py-12 text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <p class="text-lg font-medium">No courses enrolled yet</p>
                            <p class="text-sm mt-1">Start learning by enrolling in a course</p>
                            <button class="mt-4 px-6 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700">
                                Browse Courses
                            </button>
                        </div>
                    </div>

                    {{-- Weekly Study Chart --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">📈 Weekly Study Report</h2>
                        <canvas id="weeklyChart" height="80"></canvas>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Learning Streak Calendar --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">🔥 Learning Streak</h3>
                        <div class="text-center mb-4">
                            <p class="text-4xl font-bold text-sky-600">{{ $profile->streak_count }}</p>
                            <p class="text-sm text-gray-600">days in a row</p>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-xs">
                            @for($i = 0; $i < 28; $i++)
                            <div class="aspect-square bg-{{ $i < $profile->streak_count ? 'sky' : 'gray' }}-{{ $i < $profile->streak_count ? '400' : '200' }} rounded"></div>
                            @endfor
                        </div>
                    </div>

                    {{-- Quick Actions --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">⚡ Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <span class="text-2xl mr-3">📝</span>
                                <span class="font-medium text-gray-700">My Notes</span>
                            </a>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <span class="text-2xl mr-3">🗺️</span>
                                <span class="font-medium text-gray-700">Learning Roadmaps</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <span class="text-2xl mr-3">⚙️</span>
                                <span class="font-medium text-gray-700">Profile Settings</span>
                            </a>
                        </div>
                    </div>

                    {{-- Motivational Quote --}}
                    <div class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl shadow-sm p-6 text-white">
                        <p class="text-sm font-medium mb-2">💡 Daily Inspiration</p>
                        <p class="italic mb-2">"The only way to do great work is to love what you do."</p>
                        <p class="text-xs text-purple-100">- Steve Jobs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('weeklyChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($data['weeklyStudyData']['labels']) !!},
                datasets: [{
                    label: 'Study Hours',
                    data: {!! json_encode($data['weeklyStudyData']['data']) !!},
                    borderColor: '#0ea5e9',
                    backgroundColor: 'rgba(14, 165, 233, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>