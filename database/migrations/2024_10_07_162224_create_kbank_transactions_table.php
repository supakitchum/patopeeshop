<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbankTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbank_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('txn_id');
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('partner_id');
            $table->text('response')->nullable();
            $table->timestamps();

            $table->index('partner_id');
            $table->foreign('partner_id')->references('id')->on('partners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kbank_transactions');
    }
}
