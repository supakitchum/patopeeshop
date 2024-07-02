<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbankApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbank_api_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transactionId');
            $table->string('channelCode');
            $table->string('tranAmount');
            $table->string('reference1');
            $table->string('reference2');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('kbank_api_logs');
    }
}
