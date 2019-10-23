<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlongs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->text('question');
            $table->text('correct_ans')->nullable();
            $table->double('marks')->nullable();
            $table->integer('length')->nullable();
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
        Schema::dropIfExists('qlongs');
    }
}
