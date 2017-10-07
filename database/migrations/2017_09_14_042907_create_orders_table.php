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
          $table->timestamp('datetime');
          $table->integer('table_no');
          $table->integer('queue_no');
          $table->integer('customer_id')->unsigned()->index();
          $table->double('amount');
          $table->decimal('vat', 5, 2);
          $table->double('discount');
          $table->double('grand_total'); // (amount - discount) * (1 + VAT/100)
          $table->string('memo')->nullable();
          $table->integer('sale_id')->unsigned()->nullable();
          $table->integer('status')->default(0); // 0 is not yet paid, 1 is paid
          $table->integer('order_by_id')->unsigned();
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
        Schema::dropIfExists('orders');
    }
}
