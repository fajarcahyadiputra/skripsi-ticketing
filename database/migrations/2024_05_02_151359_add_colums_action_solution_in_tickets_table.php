<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsActionSolutionInTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->text("action_solution")->nullable()->after("version");
            $table->text("eskalasi")->nullable()->after("action_solution");
            $table->string("ticket_draft", 100)->nullable()->after("eskalasi");
            $table->string("ticket_queued",100)->nullable()->after("ticket_draft");
            $table->text("keterangan")->nullable()->after("ticket_queued");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn("action_solution");
            $table->dropColumn("eskalasi");
            $table->dropColumn("ticket_draft");
            $table->dropColumn("ticket_queued");
            $table->dropColumn("keterangan");
        });
    }
}
