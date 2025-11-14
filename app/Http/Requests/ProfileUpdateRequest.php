<?php

// app/Http/Requests/ProfileUpdateRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($this->user()->id), 'alpha_dash'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'gender' => ['nullable', 'in:male,female,other'],
            'dob' => ['nullable', 'date', 'before:today'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'timezone' => ['nullable', 'timezone'],
            'education_level' => ['nullable', 'in:matric,intermediate,bachelor,master,other'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'skill_interests' => ['nullable', 'array'],
            'skill_interests.*' => ['string'],
            'learning_goals' => ['nullable', 'string', 'max:1000'],
            'preferred_hours' => ['nullable', 'in:morning,afternoon,evening,night'],
            'preferred_mode' => ['nullable', 'in:self_paced,daily_planner,hybrid'],
            'experience_level' => ['nullable', 'in:beginner,intermediate,advanced'],
            'bio' => ['nullable', 'string', 'max:500'],
            'social_github' => ['nullable', 'url', 'max:255'],
            'social_linkedin' => ['nullable', 'url', 'max:255'],
            'social_portfolio' => ['nullable', 'url', 'max:255'],
            'study_hours_target' => ['nullable', 'integer', 'min:1', 'max:24'],
            'notification_email' => ['boolean'],
            'notification_frequency' => ['nullable', 'in:daily,weekly,monthly'],
            'public_profile' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'This email is already registered.',
            'username.unique' => 'This username is already taken.',
            'username.alpha_dash' => 'Username can only contain letters, numbers, dashes and underscores.',
            'dob.before' => 'Date of birth must be in the past.',
            'study_hours_target.max' => 'Study hours target cannot exceed 24 hours.',
        ];
    }
}