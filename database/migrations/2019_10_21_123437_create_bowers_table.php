<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bowers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('browser_name_regex')->nullable();
            $table->text('browser_name_pattern')->nullable();
            $table->text('parent')->nullable();
            $table->text('platform_description')->nullable();
            $table->text('platform_bits')->nullable();
            $table->text('device_name')->nullable();
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
        Schema::dropIfExists('bowers');
    }
}
