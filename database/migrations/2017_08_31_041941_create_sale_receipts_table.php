<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned()->nullable();
            $table->double('received_usd');
            $table->double('received_riel');
            $table->double('change_usd');
            $table->double('change_riel');
            $table->timestamp('receipt_datetime');
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
        Schema::dropIfExists('sale_receipts');
    }
}
