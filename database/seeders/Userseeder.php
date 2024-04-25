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
            "nama" => "agent",
            "nik" => "1345673467894356",
            "password" => bcrypt('123456'),
            "role" => "agent",
            "nomer_tlpn" => "0896726478264",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "nama" => "officer",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "0896728274",
            "role" => "officer",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "nama" => "tim analis",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "0896728274",
            "role" => "tim_analis",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);


        User::create([
            "nama" => "manajer",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "089672884033",
            "role" => "manajer",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "nama" => "supervisor",
            "nik" => rand(1000000000000000, 9999999999999999),
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "089673434334",
            "role" => "supervisor",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
    }
}
