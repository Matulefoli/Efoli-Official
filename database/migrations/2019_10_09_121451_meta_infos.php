<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MetaInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author')->nullable()->default('efoli');
            $table->string('description')->nullable()->default('efoli');
            $table->string('copyright')->nullable()->default('copyright');
            $table->string('expires')->nullable();
            $table->string('cache-control')->nullable();
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
        Schema::dropIfExists('meta_infos');
    }
}
