<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id');
            $table->tinyInteger('monday_morning');
            $table->tinyInteger('monday_afternoon');
            $table->tinyInteger('tuesday_morning');
            $table->tinyInteger('tuesday_afternoon');
            $table->tinyInteger('wednesday_morning');
            $table->tinyInteger('wednesday_afternoon');
            $table->tinyInteger('thursday_morning');
            $table->tinyInteger('thursday_afternoon');
            $table->tinyInteger('friday_morning');
            $table->tinyInteger('friday_afternoon');
            $table->tinyInteger('saturday_morning');
            $table->tinyInteger('saturday_afternoon');
            $table->tinyInteger('sunday_morning');
            $table->tinyInteger('sunday_afternoon');
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
        Schema::dropIfExists('agent_shifts_');
    }
}
