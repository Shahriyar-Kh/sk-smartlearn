<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventColumnToActivityLogTable extends Migration
{
public function up()
{
    Schema::table('activity_log', function (Blueprint $table) {
        if (!Schema::hasColumn('activity_log', 'event')) {
            $table->string('event')->nullable();
        }
    });
}
public function down()
{
    Schema::table('activity_log', function (Blueprint $table) {
        if (Schema::hasColumn('activity_log', 'event')) {
            $table->dropColumn('event');
        }
    }); 
}
}