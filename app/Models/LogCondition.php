<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogCondition extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'log_condition';
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
