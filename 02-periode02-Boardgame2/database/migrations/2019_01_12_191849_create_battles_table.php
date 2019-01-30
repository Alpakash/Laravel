<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('game_id');
            $table->integer('games_id');
            $table->integer('player1')->nullable();
            $table->integer('player2')->nullable();
            $table->integer('player3')->nullable();
            $table->integer('player4')->nullable();
            $table->integer('player5')->nullable();
            $table->integer('player6')->nullable();
            $table->integer('score1')->nullable();
            $table->integer('score2')->nullable();
            $table->integer('score3')->nullable();
            $table->integer('score4')->nullable();
            $table->integer('score5')->nullable();
            $table->integer('score6')->nullable();
            $table->integer('won_by')->nullable();
            $table->string('img')->nullable();
            $table->timestamp('played_date');
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
        Schema::dropIfExists('battles');
    }
}
