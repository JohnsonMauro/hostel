<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_environment_id')->unsigned();
            $table->foreign('type_environment_id')
                ->references('id')->on('type_environment');
            $table->string('name');
            $table->string('simple_description',100);
            $table->string('long_description',1000);
            $table->integer('active');
            $table->integer('version');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environment');
    }
}
