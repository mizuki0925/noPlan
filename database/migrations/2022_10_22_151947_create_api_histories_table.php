<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_histories', function (Blueprint $table) {
            $table->id();
            $table->string('keyword')->comment('検索ワード');
            $table->string('userId')->comment('実行ユーザID');
            $table->string('ip')->comment('IPアドレス');
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
        Schema::dropIfExists('api_histories');
    }
}
