<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('elections_id')->unsigned();
            $table->foreign('elections_id')
                  ->references('id')
                  ->on('elections')
                  ->onDelete('restrict');
            $table->integer('questions_id')->unsigned();
            $table->foreign('questions_id')
                  ->references('id')
                  ->on('questions')
                  ->onDelete('restrict');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict');
            $table->string('vote',1);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
