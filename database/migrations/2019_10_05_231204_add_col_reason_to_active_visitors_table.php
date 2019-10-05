<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColReasonToActiveVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('active_visitors', function (Blueprint $table) {
            $table->string('reason')->nullable()->after('visitor_card_uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('active_visitors', function (Blueprint $table) {
            $table->dropColumn('reason');
        });
    }
}
