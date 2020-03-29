<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppe_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('ppe_supplies_description');
            $table->string('volume');
            $table->string('eircode');
            $table->string('availability_times');
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
        Schema::dropIfExists('ppe_details');
    }
}
