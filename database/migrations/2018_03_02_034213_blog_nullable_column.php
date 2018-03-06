<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogNullableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->text('body')->nullable()->change();
        });
        
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
            $table->text('body')->nullable()->change();
            //
        });
    }
}
