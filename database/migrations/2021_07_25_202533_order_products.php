<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProducts extends Migration
{
    /**
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('product_order',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_Id');
            $table->unsignedBigInteger('product_Id');
            $table->integer('quantity');
           });
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
