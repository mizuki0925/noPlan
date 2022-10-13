<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateaccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessLogs', function (Blueprint $table) {
            $table->id();
            $table->string('userId')->comment('ユーザID');
            $table->string('body')->comment('内容');
            $table->string('query')->nullable()->comment('実行クエリ');
            $table->string('userAgent')->comment('ユーザエージェント');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessLogs');
    }
}
