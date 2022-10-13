<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpToaccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessLogs', function (Blueprint $table) {
            $table->string('userId')->nullable()->change();
            $table->string('ip')->after('userAgent')->comment('IPアドレス');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessLogs', function (Blueprint $table) {
            $table->string('userId')->comment('ユーザID');
            $table->dropColumn('ip');
        });
    }
}
