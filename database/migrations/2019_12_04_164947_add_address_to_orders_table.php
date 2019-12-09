<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('province');
            $table->string('amphoe');
            $table->string('district');
            $table->string('zip_code');
            $table->text('address');
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('email');
            $table->dropColumn('province');
            $table->dropColumn('amphoe');
            $table->dropColumn('district');
            $table->dropColumn('zip_code');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
}
