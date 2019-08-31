<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortuserTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portuser_transactions_', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('portuser_uuid');
            $table->integer('clock_type');
            $table->dateTime('clock_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portuser_transactions_');
    }
}
