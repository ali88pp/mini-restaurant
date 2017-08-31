<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soid',20)->index();
            $table->dateTime('sale_date');
            $table->string('customer_id');
            $table->string('order');
            $table->double('amount');
            $table->decimal('vat',5,2);
            $table->string('remark');
            $table->integer('table_no');
            $table->integer('waiting_no');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('sales');
    }
}
