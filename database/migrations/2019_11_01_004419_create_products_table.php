<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('desc')->nullable();
            $table->bigInteger('ident')->nullable();
            $table->string('image')->nullable();
            $table->increments('xml_name')->nullable();
            $table->increments('xml_cat')->nullable();
            $table->bigInteger('cat_id')->nullable();
            $table->longText('remote_images')->nullable();
            $table->decimal('price_amount')->nullable();
            $table->bigInteger('price')->nullable();
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
        Schema::drop('products');
    }
}
