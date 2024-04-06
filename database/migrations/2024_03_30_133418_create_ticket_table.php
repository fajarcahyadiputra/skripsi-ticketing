<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("agent_id");
            $table->string("no_tiket",100);
            $table->bigInteger("no_inet");
            $table->string("nomer_hp",20);
            $table->string("witel",100);
            $table->string("sto",100);
            $table->string("paket_pcrf",100);
            $table->enum("status_usetv", ["ok","nok","no"]);
            $table->enum("pusage_pcrf", ["ok","isoliran" ]);
            $table->enum("status_customer", ["enable","isoliran" ]);
            $table->string("radius_package",100);
            $table->string("reference_profil",200); 
            $table->string("current_profil",200);
            $table->string("nama_model",200);
            $table->string("version",200);
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
