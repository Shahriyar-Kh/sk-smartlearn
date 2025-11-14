{{-- resources/views/profile/edit.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">⚙️ Profile Settings</h1>
                <p class="mt-2 text-gray-600">Manage your account information and preferences</p>
            </div>

            @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            {{-- Profile Picture --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">📸 Profile Picture</h2>
                <div class="flex items-center space-x-6">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full object-cover">
                    <div class="flex-1">
                        <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                            @csrf
                            <input type="file" name="avatar" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
                            <div class="flex space-x-3">
                                <button type="submit" class="px-4 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700 text-sm">
                                    Upload New
                                </button>
                                @if($user->avatar)
                                <form action="{{ route('profile.avatar.delete') }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm" onclick="return confirm('Are you sure you want to delete your avatar?')">
                                        Remove
                                    </button>
                                </form>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Main Form --}}
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                {{-- Basic Information --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">📋 Basic Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            @error('username') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender" id="gender" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <input type="date" name="dob" id="dob" value="{{ old('dob', $user->dob?->format('Y-m-d')) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" value="{{ old('city', $user->city) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>

                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                    </div>
                </div>

                {{-- Education & Learning --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">🎓 Education & Learning</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="education_level" class="block text-sm font-medium text-gray-700">Education Level</label>
                            <select name="education_level" id="education_level" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                <option value="">Select Level</option>
                                <option value="matric" {{ old('education_level', $user->education_level) == 'matric' ? 'selected' : '' }}>Matric</option>
                                <option value="intermediate" {{ old('education_level', $user->education_level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="bachelor" {{ old('education_level', $user->education_level) == 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                                <option value="master" {{ old('education_level', $user->education_level) == 'master' ? 'selected' : '' }}>Master</option>
                                <option value="other" {{ old('education_level', $user->education_level) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="field_of_study" class="block text-sm font-medium text-gray-700">Field of Study</label>
                            <input type="text" name="field_of_study" id="field_of_study" value="{{ old('field_of_study', $user->field_of_study) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>

                        <div>
                            <label for="preferred_hours" class="block text-sm font-medium text-gray-700">Preferred Study Time</label>
                            <select name="preferred_hours" id="preferred_hours" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                <option value="">Select Time</option>
                                <option value="morning" {{ old('preferred_hours', $user->preferred_hours) == 'morning' ? 'selected' : '' }}>Morning</option>
                                <option value="afternoon" {{ old('preferred_hours', $user->preferred_hours) == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                                <option value="evening" {{ old('preferred_hours', $user->preferred_hours) == 'evening' ? 'selected' : '' }}>Evening</option>
                                <option value="night" {{ old('preferred_hours', $user->preferred_hours) == 'night' ? 'selected' : '' }}>Night</option>
                            </select>
                        </div>

                        <div>
                            <label for="study_hours_target" class="block text-sm font-medium text-gray-700">Daily Study Goal (hours)</label>
                            <input type="number" name="study_hours_target" id="study_hours_target" min="1" max="24" 
                                value="{{ old('study_hours_target', $user->profile->study_hours_target) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Skill Interests</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach(['Web Development', 'Mobile Development', 'AI & ML', 'Data Science', 'UI/UX Design', 'Cloud Computing', 'Cybersecurity', 'DevOps', 'Blockchain'] as $skill)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="skill_interests[]" value="{{ $skill }}" 
                                    class="rounded border-gray-300 text-sky-600 focus:ring-sky-500"
                                    {{ in_array($skill, old('skill_interests', $user->skill_interests ?? [])) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">{{ $skill }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="learning_goals" class="block text-sm font-medium text-gray-700">Learning Goals</label>
                        <textarea name="learning_goals" id="learning_goals" rows="3" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">{{ old('learning_goals', $user->learning_goals) }}</textarea>
                    </div>
                </div>

                {{-- About Me --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">👤 About Me</h2>
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="4" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500" 
                            placeholder="Tell us about yourself...">{{ old('bio', $user->profile->bio) }}</textarea>
                    </div>
                </div>

                {{-- Social Links --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">🔗 Social Links</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="social_github" class="block text-sm font-medium text-gray-700">GitHub Profile</label>
                            <input type="url" name="social_github" id="social_github" value="{{ old('social_github', $user->profile->social_github) }}" 
                                placeholder="https://github.com/username"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                        <div>
                            <label for="social_linkedin" class="block text-sm font-medium text-gray-700">LinkedIn Profile</label>
                            <input type="url" name="social_linkedin" id="social_linkedin" value="{{ old('social_linkedin', $user->profile->social_linkedin) }}" 
                                placeholder="https://linkedin.com/in/username"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                        <div>
                            <label for="social_portfolio" class="block text-sm font-medium text-gray-700">Portfolio Website</label>
                            <input type="url" name="social_portfolio" id="social_portfolio" value="{{ old('social_portfolio', $user->profile->social_portfolio) }}" 
                                placeholder="https://yourwebsite.com"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                    </div>
                </div>

                {{-- Preferences --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">🔔 Preferences</h2>
                    <div class="space-y-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="notification_email" value="1" 
                                {{ old('notification_email', $user->profile->notification_email) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <span class="ml-2 text-sm text-gray-700">Receive email notifications</span>
                        </label>

                        <div>
                            <label for="notification_frequency" class="block text-sm font-medium text-gray-700">Notification Frequency</label>
                            <select name="notification_frequency" id="notification_frequency" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                <option value="daily" {{ old('notification_frequency', $user->profile->notification_frequency) == 'daily' ? 'selected' : '' }}>Daily</option>
                                <option value="weekly" {{ old('notification_frequency', $user->profile->notification_frequency) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="monthly" {{ old('notification_frequency', $user->profile->notification_frequency) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            </select>
                        </div>

                        <label class="flex items-center">
                            <input type="checkbox" name="public_profile" value="1" 
                                {{ old('public_profile', $user->profile->public_profile) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <span class="ml-2 text-sm text-gray-700">Make my profile public</span>
                        </label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('student.dashboard') }}" 
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-sky-600 text-white rounded-lg hover:bg-sky-700 font-semibold">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>