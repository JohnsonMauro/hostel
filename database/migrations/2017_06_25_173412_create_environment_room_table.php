<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_room', function (Blueprint $table) {
            $table->integer('active')->default(1);
            $table->integer('version')->default(1);
            $table->timestamps(); 
        });

        Schema::table('environment_room', function(Blueprint $table) {
            $table->integer('environment_id')->unsigned()->index();
            $table->foreign('environment_id')
                ->references('id')
                ->on('environment');
        });

        Schema::table('environment_room', function(Blueprint $table) {
            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('environment_room', function (Blueprint $table) {
            //
        });
    }
}
