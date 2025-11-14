<?php

// app/Models/Profile.php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'total_study_hours',
        'streak_count',
        'last_login',
        'social_github',
        'social_linkedin',
        'social_portfolio',
        'notification_email',
        'notification_frequency',
        'study_hours_target',
        'public_profile',
    ];

    protected function casts(): array
    {
        return [
            'last_login' => 'datetime',
            'notification_email' => 'boolean',
            'public_profile' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods
    public function incrementStudyHours(int $hours = 1)
    {
        $this->increment('total_study_hours', $hours);
    }

    public function updateStreak()
    {
        $lastLogin = $this->last_login;
        
        if (!$lastLogin || $lastLogin->isToday()) {
            return;
        }

        if ($lastLogin->isYesterday()) {
            $this->increment('streak_count');
        } else {
            $this->update(['streak_count' => 1]);
        }
    }
}
