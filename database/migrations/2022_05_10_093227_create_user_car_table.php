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
        Schema::create('user_car', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('start_time');
            $table->dateTime('return_time');
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
        Schema::dropIfExists('user_car');
    }
};
