<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ws_title');
            $table->string('ws_sub_title')->nullable();
            $table->string('ws_location')->nullable();
            $table->string('ws_fax')->nullable();
            $table->string('ws_phone')->nullable();
            $table->string('ws_email')->nullable();
            $table->string('ws_copy_right')->nullable();
            $table->string('ws_video')->nullable();
            $table->string('ws_header_icon')->nullable();
            $table->string('ws_footer_icon')->nullable();
            $table->string('ws_logo')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
