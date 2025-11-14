<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogTable extends Migration
{
    public function up()
    {
        Schema::connection(config('activitylog.database_connection'))
            ->create(config('activitylog.table_name'), function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->string('log_name')->nullable();
                $table->text('description')->nullable();

                // subject_* columns
                $table->nullableMorphs('subject', 'subject');

                // causer_* columns
                $table->nullableMorphs('causer', 'causer');

                $table->json('properties')->nullable();

                // Spatie v4 required columns
                $table->string('event')->nullable();
                $table->uuid('batch_uuid')->nullable();

                $table->timestamps();

                $table->index('log_name');
                $table->index('event');
                $table->index('batch_uuid');
            });
    }

    public function down()
    {
        Schema::connection(config('activitylog.database_connection'))
            ->dropIfExists(config('activitylog.table_name'));
    }
}
