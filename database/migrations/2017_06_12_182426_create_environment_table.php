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
            $table->string('name');
            $table->string('simple_description',100);
            $table->string('long_description',1000);
            $table->decimal('value','5','0');
            $table->integer('amount_adult')->default(2);
            $table->integer('amount_children')->default(1);
            $table->integer('qtd_adult')->nullable(false);
            $table->integer('qtd_children')->nullable(false);
            $table->integer('qtd_bed')->nullable(false);
            $table->integer('active')->default(1);
            $table->integer('version')->default(1);
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
        Schema::dropIfExists('environment');
    }
}
