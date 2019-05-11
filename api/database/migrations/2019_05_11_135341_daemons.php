<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Daemons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daemon', function (Blueprint $table) {
            $table->bigIncrements('id')->index(); //Daemon ID
            $table->string('name'); //Daemon Name
            $table->string('ip');
            $table->string('port');
            $table->string('password');
            $table->bigInteger('max_server');
            $table->integer('level'); // 0优先不选 1优先选择 2随机吧
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
        Schema::dropIfExists('daemon');
    }
}
