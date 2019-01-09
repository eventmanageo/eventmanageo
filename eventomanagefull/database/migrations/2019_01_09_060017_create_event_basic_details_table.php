<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventBasicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_basic_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name')->nullable();
            $table->string('event_type')->nullable();
            $table->string('event_date_to')->nullable();
            $table->string('event_date_from')->nullable();
            $table->string('event_manager_id')->nullable();
            $table->string('time_when_assigned_to_manager')->nullable();
            $table->string('event_status')->nullable(); //it is published when user published it, then it is assigned when admin assigned to manager then when manager confirm it then it is changed to confirm.
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
        Schema::dropIfExists('event_basic_details');
    }
}
