<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tickets';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
    protected $guarded = [];
    public function agent()
    {
        return $this->hasOne(Agent::class, "id", "agent_id");
    }
    public static function generateNoTicket()
    {
        $max_no_ticket = DB::select("SELECT MAX(RIGHT(no_ticket,4)) as max_no_ticket FROM tickets");
        if ($max_no_ticket) {
            $max_no_ticket =  collect($max_no_ticket)->pluck('max_no_ticket')->toArray()[0];
            $kode_interval =  (int) $max_no_ticket + 1;
        } else {
            $kode_interval =  1;
        }
        return 'TK' . str_pad($kode_interval, 4, '0', STR_PAD_LEFT);
    }
}
