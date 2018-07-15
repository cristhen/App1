<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questions_id')->unsigned();
            $table->foreign('questions_id')
                  ->references('id')
                  ->on('questions')
                  ->onDelete('restrict');
            $table->integer('approved')->nullable;
            $table->integer('abstain')->nullable;
            $table->integer('against')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_votes');
    }
}
