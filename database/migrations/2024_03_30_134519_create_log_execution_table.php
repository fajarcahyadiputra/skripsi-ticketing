<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogExecutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_executions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_id");
            $table->string("rx_olt",100);
            $table->string("rx_onu",100);
            $table->string("temp_ont", 100);
            $table->enum("status_acs", ["ok","nok"]);
            $table->string("wifi_config", 200);
            $table->string("conn_state", 100);
            $table->string("ext_ip", 100);
            $table->integer("chanel_use");
            $table->string("interface", 100);
            $table->string("phone_state", 100);
            $table->string("dns_server", 100);
            $table->string("speed_test", 100);
            $table->string("rate_success", 100);
            $table->enum("wan_trafic", ["ok","nok","tidak di ukur"]);
            $table->enum("lan_trafic", ["ok","nok","tidak di ukur"]);
            $table->integer("wlan");
            $table->integer("lan");
            $table->integer("cpu");
            $table->integer("memory"); 
            $table->string("firewall_level", 100);
            $table->enum("condition",["before","after"]);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_executions');
    }
}
