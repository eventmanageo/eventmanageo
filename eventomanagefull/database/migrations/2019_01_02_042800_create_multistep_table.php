<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultistepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multistep', function (Blueprint $table) {
            $table->increments('id');
            $table->String('type');
            $table->String('type2');
            $table->String('location');
            $table->date('check_in');
            $table->date('check_out');
            $table->String('guest');
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
        Schema::dropIfExists('multistep');
    }
}
