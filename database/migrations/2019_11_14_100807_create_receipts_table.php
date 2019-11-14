<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('tracking_number')->nullable();
            $table->float('amount');
            $table->text('comment')->nullable();
            $table->integer('uid');
            $table->integer('sender_id');
            $table->boolean('sending')->default(0);
            $table->text('address')->nullable();
            $table->dateTime('send_at')->nullable();
            $table->string('platform');
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
        Schema::dropIfExists('receipts');
    }
}
