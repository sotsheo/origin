<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuBackend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('menu_backend')){
            Schema::create('menu_backend', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('link');
                $table->text('icon');
                $table->string('id_parent');
                $table->integer('orders')->default(0);
                $table->rememberToken();
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
        Schema::dropIfExists('menu_backend');
    }
}
