<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('payment_mode');
            $table->string('payment_amount');
            $table->string('full_or_partial');
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
        Schema::dropIfExists('event_payment_details');
    }
}
