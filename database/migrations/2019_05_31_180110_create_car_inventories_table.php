<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('car_models');
            $table->integer('total');
            $table->integer('sold');
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
        Schema::dropIfExists('car_inventories');
    }
}
