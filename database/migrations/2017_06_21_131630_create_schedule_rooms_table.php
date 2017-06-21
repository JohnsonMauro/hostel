<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->date('started_date');
            $table->date('end_date');
            $table->decimal('value', '5','0');
            $table->timestamps();
        });

        Schema::table('schedule_rooms', function(Blueprint $table) {
            $table->integer('environment_id')->unsigned()->index();
            $table->foreign('environment_id')
                ->references('id')
                ->on('environment');
        });

        Schema::table('schedule_rooms', function(Blueprint $table) {
            $table->integer('users_id')->unsigned()->index();
            $table->foreign('users_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_rooms');
    }
}
