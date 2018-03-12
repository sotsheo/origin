<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class History extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('history')){
        Schema::create('history', function ($table) {
            $table->increments('id');
            $table->string('event');
            $table->integer('id_account');
            $table->integer('id_client');
            $table->dateTime('time_read');
            $table->dateTime('time_close');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
