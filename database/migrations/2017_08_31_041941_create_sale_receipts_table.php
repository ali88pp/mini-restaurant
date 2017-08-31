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
            $table->increments('id')->index();
            $table->dateTime('receipt_date');
            $table->json('ref_id');
            $table->double('amt_usd');
            $table->double('amt_riel');
            $table->double('change_usd');
            $table->double('change_riel');
            $table->boolean('is_active');
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
        Schema::dropIfExists('sale_receipts');
    }
}
