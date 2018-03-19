<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title')->unique();
            $table->integer('price');
            $table->string('image'); 
            $table->string('description');                                   
            $table->integer('left_in_stock')->default(10);
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('manufacture')->nullable();
            $table->string('model')->nullable();
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('user_id');            
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
        Schema::dropIfExists('orders');
    }
}
