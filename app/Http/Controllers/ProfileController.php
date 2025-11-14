<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($user->id), 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender' => ['nullable', 'in:male,female,other'],
            'dob' => ['nullable', 'date', 'before:today'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'education_level' => ['nullable', 'in:matric,intermediate,bachelor,master,other'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'skill_interests' => ['nullable', 'array'],
            'learning_goals' => ['nullable', 'string', 'max:1000'],
            'preferred_hours' => ['nullable', 'in:morning,afternoon,evening,night'],
            'bio' => ['nullable', 'string', 'max:500'],
            'social_github' => ['nullable', 'url', 'max:255'],
            'social_linkedin' => ['nullable', 'url', 'max:255'],
            'social_portfolio' => ['nullable', 'url', 'max:255'],
            'study_hours_target' => ['nullable', 'integer', 'min:1', 'max:24'],
            'notification_email' => ['boolean'],
            'notification_frequency' => ['nullable', 'in:daily,weekly,monthly'],
            'public_profile' => ['boolean'],
        ]);

        // Update user data
        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'gender' => $validated['gender'] ?? $user->gender,
            'dob' => $validated['dob'] ?? $user->dob,
            'city' => $validated['city'] ?? $user->city,
            'country' => $validated['country'] ?? $user->country,
            'phone' => $validated['phone'] ?? $user->phone,
            'education_level' => $validated['education_level'] ?? $user->education_level,
            'field_of_study' => $validated['field_of_study'] ?? $user->field_of_study,
            'skill_interests' => $validated['skill_interests'] ?? $user->skill_interests,
            'learning_goals' => $validated['learning_goals'] ?? $user->learning_goals,
            'preferred_hours' => $validated['preferred_hours'] ?? $user->preferred_hours,
        ]);

        // Update profile data
        $user->profile->update([
            'bio' => $validated['bio'] ?? $user->profile->bio,
            'social_github' => $validated['social_github'] ?? $user->profile->social_github,
            'social_linkedin' => $validated['social_linkedin'] ?? $user->profile->social_linkedin,
            'social_portfolio' => $validated['social_portfolio'] ?? $user->profile->social_portfolio,
            'study_hours_target' => $validated['study_hours_target'] ?? $user->profile->study_hours_target,
            'notification_email' => $request->has('notification_email'),
            'notification_frequency' => $validated['notification_frequency'] ?? $user->profile->notification_frequency,
            'public_profile' => $request->has('public_profile'),
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $user = Auth::user();

        // Delete old avatar
        if ($user->avatar) {
            Storage::delete('public/avatars/' . $user->avatar);
        }

        // Store new avatar
        $avatar = $request->file('avatar');
        $avatarName = time() . '_' . uniqid() . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs('public/avatars', $avatarName);

        $user->update(['avatar' => $avatarName]);

        return back()->with('success', 'Avatar updated successfully!');
    }

    public function deleteAvatar()
    {
        $user = Auth::user();

        if ($user->avatar) {
            Storage::delete('public/avatars/' . $user->avatar);
            $user->update(['avatar' => null]);
        }

        return back()->with('success', 'Avatar deleted successfully!');
    }
}