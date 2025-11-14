{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        {{-- Header --}}
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <h1 class="text-3xl font-bold text-gray-900">🎛️ Admin Dashboard</h1>
                <p class="mt-1 text-gray-600">System overview and management</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Stats Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Total Users --}}
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['totalUsers'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <span class="text-green-600">+{{ $stats['newUsersThisWeek'] }}</span> this week
                            </p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Students --}}
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Students</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['totalStudents'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ number_format(($stats['totalStudents']/$stats['totalUsers'])*100, 1) }}% of total</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Courses --}}
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Courses</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['totalCourses'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <span class="text-green-600">{{ $stats['publishedCourses'] }} published</span>
                            </p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- New Signups --}}
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">This Month</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['newUsersThisMonth'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">New registrations</p>
                        </div>
                        <div class="bg-orange-100 p-3 rounded-full">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Charts Section --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- User Signups Chart --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">📊 User Signups (Last 7 Days)</h3>
                        <canvas id="signupsChart" height="80"></canvas>
                    </div>

                    {{-- Active Users Chart --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">📈 Daily Active Users</h3>
                        <canvas id="activeUsersChart" height="80"></canvas>
                    </div>

                    {{-- Recent Users Table --}}
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-900">👥 Recent Registrations</h3>
                            <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-600 hover:underline">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($recentUsers as $recentUser)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img class="h-10 w-10 rounded-full" src="{{ $recentUser->avatar_url }}" alt="">
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">{{ $recentUser->name }}</p>
                                                    <p class="text-xs text-gray-500">{{ $recentUser->city }}, {{ $recentUser->country }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $recentUser->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                {{ $recentUser->hasRole('admin') ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                                {{ $recentUser->roles->first()->name ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $recentUser->created_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($recentUser->email_verified_at)
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                            @else
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Quick Actions --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">⚡ Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.users.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <span class="text-2xl mr-3">👥</span>
                                <span class="font-medium text-gray-700 group-hover:text-blue-600">Manage Users</span>
                            </a>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <span class="text-2xl mr-3">📚</span>
                                <span class="font-medium text-gray-700 group-hover:text-blue-600">Manage Courses</span>
                            </a>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <span class="text-2xl mr-3">📧</span>
                                <span class="font-medium text-gray-700 group-hover:text-blue-600">Send Notification</span>
                            </a>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <span class="text-2xl mr-3">📊</span>
                                <span class="font-medium text-gray-700 group-hover:text-blue-600">View Reports</span>
                            </a>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <span class="text-2xl mr-3">⚙️</span>
                                <span class="font-medium text-gray-700 group-hover:text-blue-600">System Settings</span>
                            </a>
                        </div>
                    </div>

                    {{-- System Health --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">🏥 System Health</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Server Status</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Online
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Database</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Connected
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Queue Jobs</span>
                                <span class="text-sm font-medium text-gray-900">0 pending</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Storage Used</span>
                                <span class="text-sm font-medium text-gray-900">2.3 GB</span>
                            </div>
                        </div>
                    </div>

                    {{-- Recent Activity --}}
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">📝 Recent Activity</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 mt-2 bg-blue-500 rounded-full"></div>
                                <div class="ml-3">
                                    <p class="text-gray-900">New user registered</p>
                                    <p class="text-xs text-gray-500">2 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 mt-2 bg-green-500 rounded-full"></div>
                                <div class="ml-3">
                                    <p class="text-gray-900">Course published</p>
                                    <p class="text-xs text-gray-500">1 hour ago</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 mt-2 bg-purple-500 rounded-full"></div>
                                <div class="ml-3">
                                    <p class="text-gray-900">System backup completed</p>
                                    <p class="text-xs text-gray-500">3 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // User Signups Chart
        const signupsCtx = document.getElementById('signupsChart').getContext('2d');
        new Chart(signupsCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartData['userSignups']['labels']) !!},
                datasets: [{
                    label: 'New Users',
                    data: {!! json_encode($chartData['userSignups']['data']) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
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

        // Active Users Chart
        const activeCtx = document.getElementById('activeUsersChart').getContext('2d');
        new Chart(activeCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartData['activeUsers']['labels']) !!},
                datasets: [{
                    label: 'Active Users',
                    data: {!! json_encode($chartData['activeUsers']['data']) !!},
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
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