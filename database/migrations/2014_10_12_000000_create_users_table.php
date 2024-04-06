<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//     1. agent hanya bisa buka di user dia sendiri
// 2. ⁠manajer all akses
// 3. ⁠tim analis all akses
// 4. ⁠officer all akses
// 5. ⁠supervisor all akses (bisa menambahkan user
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('nik', 16);
            $table->string('password', 200);
            $table->enum('role', ['agent', 'manajer', 'tim_analis', 'officer','supervisor'])->default('agent');
            $table->enum('status_aktif', ['aktif', 'tidak'])->default('aktif');
            $table->string('nomer_tlpn', 15)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
