<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'google_id',
        'gender',
        'dob',
        'city',
        'country',
        'phone',
        'timezone',
        'education_level',
        'field_of_study',
        'skill_interests',
        'learning_goals',
        'preferred_hours',
        'preferred_mode',
        'experience_level',
        'primary_goal',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'skill_interests' => 'array',
            'dob' => 'date',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'city', 'country'])
            ->logOnlyDirty();
    }

    // Relationships
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'created_by');
    }

    // Accessors
    public function getAvatarUrlAttribute()
    {
        return $this->avatar 
            ? asset('storage/avatars/' . $this->avatar)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=38bdf8&background=f0f9ff';
    }

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    // Helper Methods
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isStudent(): bool
    {
        return $this->hasRole('student');
    }

    public function updateLastLogin()
    {
        $this->profile->update(['last_login' => now()]);
    }
}