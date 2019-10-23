<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_halls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id');
            $table->integer('question_id');
            $table->integer('applicant_id');
            $table->double('marks')->nullable();
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->date('submission_time')->nullable();
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
        Schema::dropIfExists('exam_halls');
    }
}
