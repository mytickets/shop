<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pay_type')->nullable();
            $table->string('pay_place')->nullable();
            $table->longText('pay_adr')->nullable();
            $table->string('pay_contact')->nullable();
            $table->decimal('pay_discount')->nullable();
            $table->string('status')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::drop('orders');
    }
}
