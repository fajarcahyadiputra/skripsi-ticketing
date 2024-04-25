<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogBeforeExecution extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'log_before_executions';
    protected $fillable = ["ticket_id","rx_olt","rx_onu","temp_ont","status_acs","wifi_config","conn_state","ext_ip","chanel_use","interference","phone_state","dns_server","speed_test","ticket_draft","ticket_queued","rate_success","alasan_dispatch","eskalasi","action_solution","wan_trafic","lan_trafic","wlan","lan","cpu","memory","firewall_level","condition","keterangan"];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    protected $guarded = [];
    public function ticket()
    {
        return $this->hasOne(Ticket::class, "id", "ticket_id");
    }
}
