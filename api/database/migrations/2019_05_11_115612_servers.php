<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id')->index(); //Instance ID
            $table->bigInteger('daemon_id'); //Daemon ID
            $table->bigInteger('sid'); //Server ID of Daemon
            $table->string('name');
            $table->string('ip');
            $table->integer('port');
            $table->integer('players');
            $table->string('core');
            $table->bigInteger('owner'); //Owner id
            $table->dateTime('due');
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
        Schema::dropIfExists('servers');
    }
}