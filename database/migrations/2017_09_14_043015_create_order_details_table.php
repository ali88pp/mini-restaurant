<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('order_id')->unsigned()->index();
          $table->integer('item_id')->unsigned()->index();
          $table->string('item_name');
          $table->string('item_type')->index();
          $table->float('quantity');
          $table->double('unit_price');
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
        Schema::dropIfExists('order_details');
    }
}
