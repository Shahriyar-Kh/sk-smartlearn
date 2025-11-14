<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->integer('total_study_hours')->default(0);
            $table->integer('streak_count')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->string('social_github')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_portfolio')->nullable();
            $table->boolean('notification_email')->default(true);
            $table->enum('notification_frequency', ['daily', 'weekly', 'monthly'])->default('weekly');
            $table->integer('study_hours_target')->default(2);
            $table->boolean('public_profile')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};