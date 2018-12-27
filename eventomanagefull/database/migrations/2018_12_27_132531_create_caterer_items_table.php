<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatererItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caterer_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_description');
            $table->integer('item_dine_time')->unsigned();
            $table->string('item_category');
            $table->string('item_price');
            $table->string('item_picture');
            $table->integer('vendor_id')->unsigned();
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('item_dine_time')->references('id')->on('dine_times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caterer_items');
    }
}
