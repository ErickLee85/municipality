<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_wos', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('work_performed')->nullable();
            $table->integer('old_meter_number')->nullable();
            $table->integer('old_meter_reading')->nullable();
            $table->integer('old_radio_number')->nullable();
            $table->integer('new_meter_number')->nullable();
            $table->integer('new_meter_reading')->nullable();
            $table->integer('new_radio_number')->nullable();
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
        Schema::dropIfExists('meter_wos');
    }
};
