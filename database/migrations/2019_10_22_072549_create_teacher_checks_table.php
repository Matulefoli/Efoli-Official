<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_checks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->string('sub_ques_type')->nullable();
            $table->integer('sub_ques_id')->nullable();
            $table->text('submitted_answer')->nullable();
            $table->integer('job_id');
            $table->string('status')->comment('accepted/denied/null')->default('accepted');
            $table->double('gained_marks')->nullable();
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
        Schema::dropIfExists('teacher_checks');
    }
}
