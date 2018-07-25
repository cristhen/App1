<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('elections_id')->unsigned();
            $table->foreign('elections_id')
                  ->references('id')
                  ->on('elections')
                  ->onDelete('restrict');
            $table->integer('consortiums_id')->unsigned();
            $table->foreign('consortiums_id')
                  ->references('id')
                  ->on('consortiums')
                  ->onDelete('restrict');
            $table->string('question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
