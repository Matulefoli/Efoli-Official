<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQmultisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qmultis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->text('question');
            $table->text('answer_set')->nullable();
            $table->text('correnct_ans_set')->nullable();
            $table->double('marks')->nullable();
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
        Schema::dropIfExists('qmultis');
    }
}
