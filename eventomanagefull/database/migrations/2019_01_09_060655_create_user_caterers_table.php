<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCaterersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_caterers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned(); // it references to  id of event_basic_details
            $table->integer('package_id')->unsigned(); //it reference to id of pacakge_caterer
            $table->integer('no_of_people')->nullable();
            $table->string('datentime_when_to_serve')->nullable();
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
        Schema::dropIfExists('user_caterers');
    }
}
