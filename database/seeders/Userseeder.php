<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //1. agent hanya bisa buka di user dia sendiri
// 2. ⁠manajer all akses
// 3. ⁠tim analis all akses
// 4. ⁠officer all akses
// 5. ⁠supervisor all akses (bisa menambahkan user
    public function run()
    {
        User::create([
            "role_id" => 1,
            "nama_depan" => "agent",
            "nama_belakang" => "agent",
            "nik" => "1345673467894356",
            "password" => bcrypt('123456'),
            "jenis_kelamin" => "laki-laki",
            "role" => "agent",
            "nomer_hp" => "0896726478264",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "role_id" => 2,
            "nama_depan" => "officer",
            "nama_belakang" => "officer",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_hp" => "0896728274",
            "jenis_kelamin" => "laki-laki",
            "role" => "officer",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "role_id" => 3,
            "nama_depan" => "tim analis",
            "nama_belakang" => "tim analis",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_hp" => "0896728274",
            "jenis_kelamin" => "laki-laki",
            "role" => "tim_analis",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);


        User::create([
            "role_id" => 6,
            "nama_depan" => "manajer",
            "nama_belakang" => "manajer",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_hp" => "089672884033",
            "jenis_kelamin" => "laki-laki",
            "role" => "manajer",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "role_id" => 5,
            "nama_depan" => "supervisor",
            "nama_belakang" => "supervisor",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_hp" => "089673434334",
            "jenis_kelamin" => "laki-laki",
            "role" => "supervisor",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
    }
}
