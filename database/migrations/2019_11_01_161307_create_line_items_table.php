<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLineItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('line_items');
        Schema::create('line_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty')->default(1);
            $table->bigInteger('cart_id')->nullable();

            // $table->foreign('cart_id')
            //     ->references('id')
            //     ->on('carts')
            //     ->onDelete('CASCADE');


            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('order_id')->nullable();
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
        Schema::drop('line_items');
    }
}
