<?php
// database/migrations/2024_01_01_000001_add_extended_fields_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
            $table->string('avatar')->nullable()->after('email');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('timezone')->default('UTC');
            $table->enum('education_level', ['matric', 'intermediate', 'bachelor', 'master', 'other'])->nullable();
            $table->string('field_of_study')->nullable();
            $table->json('skill_interests')->nullable();
            $table->text('learning_goals')->nullable();
            $table->enum('preferred_hours', ['morning', 'afternoon', 'evening', 'night'])->nullable();
            $table->enum('preferred_mode', ['self_paced', 'daily_planner', 'hybrid'])->default('self_paced');
            $table->enum('experience_level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->string('primary_goal')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username', 'avatar', 'gender', 'dob', 'city', 'country', 'phone',
                'timezone', 'education_level', 'field_of_study', 'skill_interests',
                'learning_goals', 'preferred_hours', 'preferred_mode', 'experience_level',
                'primary_goal'
            ]);
        });
    }
};