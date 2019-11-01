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
        // Schema::drop('cats');
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('ident')->nullable();
            $table->string('name')->nullable();
            $table->longText('desc')->nullable();
            $table->string('image')->nullable();
            $table->string('xml_name')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->boolean('menu')->nullable();
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
        Schema::drop('cats');
    }
}
