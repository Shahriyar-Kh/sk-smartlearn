<?php

// app/Http/Controllers/Auth/GoogleAuthController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Exception;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Generate unique username from Google name
                $baseUsername = Str::slug($googleUser->getName());
                $username = $baseUsername;
                $counter = 1;

                // Ensure username is unique
                while (User::where('username', $username)->exists()) {
                    $username = $baseUsername . $counter;
                    $counter++;
                }

                // Create new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'username' => $username,
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(32)), // Random password for OAuth users
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(), // Auto-verify email for Google users
                ]);

                // Assign student role
                $user->assignRole('student');

                // Create profile
                Profile::create([
                    'user_id' => $user->id,
                    'last_login' => now(),
                ]);

                // Download and save Google avatar
                if ($googleUser->getAvatar()) {
                    try {
                        $avatarContents = file_get_contents($googleUser->getAvatar());
                        $avatarName = 'google_' . $user->id . '_' . time() . '.jpg';
                        $avatarPath = storage_path('app/public/avatars/' . $avatarName);
                        
                        // Create avatars directory if it doesn't exist
                        if (!file_exists(storage_path('app/public/avatars'))) {
                            mkdir(storage_path('app/public/avatars'), 0755, true);
                        }
                        
                        file_put_contents($avatarPath, $avatarContents);
                        $user->update(['avatar' => $avatarName]);
                    } catch (Exception $e) {
                        // If avatar download fails, continue without it
                        \Log::warning('Failed to download Google avatar: ' . $e->getMessage());
                    }
                }

                Auth::login($user);

                return redirect()->route('profile.complete')
                    ->with('message', '🎉 Welcome to SK SmartLearn! Your account has been created with Google. Please complete your profile.');

            } else {
                // Existing user - update Google ID if not set
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->getId()]);
                }

                // Update last login
                $user->profile->update(['last_login' => now()]);

                Auth::login($user);

                // Redirect based on role
                if ($user->hasRole('admin')) {
                    return redirect()->route('admin.dashboard')
                        ->with('success', 'Welcome back, ' . $user->name . '!');
                }

                return redirect()->route('student.dashboard')
                    ->with('success', 'Welcome back, ' . $user->name . '!');
            }

        } catch (Exception $e) {
            \Log::error('Google OAuth Error: ' . $e->getMessage());
            
            return redirect()->route('register')
                ->with('error', 'Unable to login with Google. Please try again or use email registration.');
        }
    }
}