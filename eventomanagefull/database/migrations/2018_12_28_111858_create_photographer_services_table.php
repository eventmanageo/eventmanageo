<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotographerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographer_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_description');
            $table->string('item_picture');
            $table->string('item_price');
            $table->integer('vendor_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photographer_services');
    }
}
