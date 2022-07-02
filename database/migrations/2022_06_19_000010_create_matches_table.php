<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('winner');
            $table->date('date');
            $table->unsignedInteger('score1');
            $table->unsignedInteger('score2');
            $table->unsignedBigInteger('team_id_one');            
            $table->foreign('team_id_one')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade'); 
            $table->unsignedBigInteger('team_id_two');            
            $table->foreign('team_id_two')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
