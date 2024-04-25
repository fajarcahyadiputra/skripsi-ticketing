<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Agent extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "agents";
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    protected $fillable = ["user_id","nik", "nama_depan", "nama_belakang", "jenis_kelamin", "perusahaan", "email", "tanggal_lahir", "jabatan", "nomer_hp", "domisili", "manajer", "kordinator"];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
