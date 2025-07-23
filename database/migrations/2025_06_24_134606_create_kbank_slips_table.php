<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbankSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbank_slips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('qr_text');
            $table->unsignedBigInteger('agent');
            $table->text('detail')->nullable();
            $table->string('slip_name');
            $table->decimal('amount', 10, 0)->nullable();
            $table->timestamps();

            $table->index('agent');
            $table->foreign('agent')->references('id')->on('partners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kbank_slips');
    }
}
