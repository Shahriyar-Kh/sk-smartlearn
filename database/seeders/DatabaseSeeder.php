<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call role seeder first
        $this->call(RolePermissionSeeder::class);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@sksmartlearn.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'city' => 'Rawalpindi',
            'country' => 'Pakistan',
            'timezone' => 'Asia/Karachi',
        ]);

        $admin->assignRole('admin');
        
        Profile::create([
            'user_id' => $admin->id,
            'bio' => 'System Administrator',
            'last_login' => now(),
        ]);

        // Create Sample Student Users
        $students = [
            [
                'name' => 'Ahmed Khan',
                'username' => 'ahmed_khan',
                'email' => 'ahmed@example.com',
                'gender' => 'male',
                'city' => 'Karachi',
                'country' => 'Pakistan',
                'education_level' => 'bachelor',
                'field_of_study' => 'Computer Science',
                'skill_interests' => ['Web Development', 'Laravel', 'PHP'],
                'learning_goals' => 'Master full-stack web development',
                'preferred_hours' => 'evening',
                'preferred_mode' => 'self_paced',
                'experience_level' => 'intermediate',
                'primary_goal' => 'Career Switch',
            ],
            [
                'name' => 'Fatima Ali',
                'username' => 'fatima_ali',
                'email' => 'fatima@example.com',
                'gender' => 'female',
                'city' => 'Lahore',
                'country' => 'Pakistan',
                'education_level' => 'intermediate',
                'field_of_study' => 'IT',
                'skill_interests' => ['UI/UX Design', 'Frontend Development'],
                'learning_goals' => 'Become a professional designer',
                'preferred_hours' => 'morning',
                'preferred_mode' => 'daily_planner',
                'experience_level' => 'beginner',
                'primary_goal' => 'Skill Upgrade',
            ],
            [
                'name' => 'Bilal Hassan',
                'username' => 'bilal_hassan',
                'email' => 'bilal@example.com',
                'gender' => 'male',
                'city' => 'Islamabad',
                'country' => 'Pakistan',
                'education_level' => 'master',
                'field_of_study' => 'Software Engineering',
                'skill_interests' => ['AI', 'Machine Learning', 'Python'],
                'learning_goals' => 'Specialize in AI and ML',
                'preferred_hours' => 'afternoon',
                'preferred_mode' => 'hybrid',
                'experience_level' => 'advanced',
                'primary_goal' => 'Exam Prep',
            ],
        ];

        foreach ($students as $studentData) {
            $student = User::create([
                'name' => $studentData['name'],
                'username' => $studentData['username'],
                'email' => $studentData['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'gender' => $studentData['gender'],
                'city' => $studentData['city'],
                'country' => $studentData['country'],
                'timezone' => 'Asia/Karachi',
                'education_level' => $studentData['education_level'],
                'field_of_study' => $studentData['field_of_study'],
                'skill_interests' => $studentData['skill_interests'],
                'learning_goals' => $studentData['learning_goals'],
                'preferred_hours' => $studentData['preferred_hours'],
                'preferred_mode' => $studentData['preferred_mode'],
                'experience_level' => $studentData['experience_level'],
                'primary_goal' => $studentData['primary_goal'],
            ]);

            $student->assignRole('student');

            Profile::create([
                'user_id' => $student->id,
                'bio' => 'Passionate learner at SK SmartLearn',
                'total_study_hours' => rand(10, 100),
                'streak_count' => rand(1, 30),
                'last_login' => now(),
                'study_hours_target' => rand(2, 5),
            ]);
        }

        $this->command->info('Sample users created successfully!');
        $this->command->info('Admin: admin@sksmartlearn.com / password');
        $this->command->info('Students: ahmed@example.com, fatima@example.com, bilal@example.com / password');
    }
}