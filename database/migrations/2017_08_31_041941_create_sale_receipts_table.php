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
            $table->json('references_id');
            $table->double('amount_usd');
            $table->double('amount_riel');
            $table->double('change_usd');
            $table->double('change_riel');
            $table->boolean('is_active');
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
