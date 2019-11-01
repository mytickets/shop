<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('ident')->nullable();
            $table->increments('name')->nullable();
            $table->increments('desc')->nullable();
            $table->increments('image')->nullable();
            $table->increments('xml_name')->nullable();
            $table->increments('menu')->nullable();
            $table->increments('menu_left')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cats');
    }
}
