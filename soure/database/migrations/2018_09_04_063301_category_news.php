<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_news')){
        Schema::create('category_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('news_sortdesc')->nullable();
            $table->text('desc')->nullable();
            $table->boolean('status');
            $table->string('img')->nullable();
            $table->string('date_public');
            $table->string('user');
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
         Schema::dropIfExists('category_news');
    }
}
