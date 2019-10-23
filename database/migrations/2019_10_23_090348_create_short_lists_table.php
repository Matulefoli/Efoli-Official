<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('applicant_id');
            $table->integer('job_id');
            $table->string('status')->comment('email/not')->default('email_not_sent');
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
        Schema::dropIfExists('short_lists');
    }
}
