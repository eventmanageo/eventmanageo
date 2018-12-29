<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('land_name');
            $table->string('land_description');
            $table->string('land_picture');
            $table->string('land_price');
            $table->string('land_address');
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
        Schema::dropIfExists('land_service');
    }
}
