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
          $table->string('item_code', 20)->index();
          $table->string('item_name');
          $table->float('quantity');
          $table->char('size', 1);
          $table->double('price');
          $table->string('remark')->nullable();
          $table->char('status', 2);
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
