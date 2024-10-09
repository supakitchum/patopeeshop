<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToKbankTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kbank_transactions', function (Blueprint $table) {
            $table->enum('status', ["PENDING", "CANCEL", "PAID", "VOID"])->default("PENDING");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kbank_transactions', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
