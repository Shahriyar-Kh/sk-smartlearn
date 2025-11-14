<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBatchUuidColumnToActivityLogTable extends Migration
{
public function up()
{
    Schema::table('activity_log', function (Blueprint $table) {
        if (!Schema::hasColumn('activity_log', 'batch_uuid')) {
            $table->string('batch_uuid')->nullable();
        }
    });
}


    public function down()
    {
        Schema::connection(config('activitylog.database_connection'))->table(config('activitylog.table_name'), function (Blueprint $table) {
            $table->dropColumn('batch_uuid');
        });
    }
}
