<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAgent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("nik", 16);
            $table->string("perusahaan", 200);
            $table->string("email", 200)->nullable();
            $table->string("nomer_hp", 20);
            $table->text("domisili");
            $table->string("nama_depan", 200);
            $table->string("nama_belakang", 200);
            $table->enum("jenis_kelamin", ["laki-laki","perempuan"]);
            $table->string("tanggal_lahir", 200);
            $table->string("manajer", 200);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
