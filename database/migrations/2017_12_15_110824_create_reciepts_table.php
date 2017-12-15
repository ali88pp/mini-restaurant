<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecieptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciepts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->uniqued();
            $table->timestamp('date_time');
            $table->double('amount');
            $table->double('received_usd');
            $table->double('received_riel');
            $table->double('changed_usd');
            $table->double('changed_riel');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('reciepts');
    }
}
