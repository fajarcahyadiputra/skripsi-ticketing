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
    // protected $guarded = [];
    protected $fillable = ["agent_id","no_tiket","no_inet","nomer_hp","witel","sto","paket_pcrf","pcrf_package","status_usetv","status_customer","radius_package","reference_profile","current_profile","nama_model","version","onu_type","version_id","status_tiket","action_solution","eskalasi","ticket_draft","ticket_queued","keterangan"];
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
    public static function listSTO() {
        return ["LGK", "CLD", "CPA", "PSR", "TAN", "PKU", "BEK", "CKG", "CPP", "CUG", "PLM", "KDY", "CLG", "PCM", "CID", "PDR", "GDS", "CPE", "PDK", "TBE", "LKG", "KMY", "PSM", "CRS", "SRP", "KSB", "RJG", "BJT", "CBI", "KLD", "PDG", "PGG", "KPK", "MKR", "SEG", "BAY", "CRI", "BJD", "CSR", "PDE", "BGG", "CIL", "KRG", "CLS", "BIN", "KBY", "KAL", "JTN", "DEP", "RMG", "JBB", "JAG", "LMA", "PKY", "TGA", "CWA", "CIB", "SLP", "KRA", "PGB", "PDM", "CPS", "STR", "CBR", "GBC", "CNE", "TPR", "KHL", "BLJ", "CWN", "LWL", "GPI", "CPD", "CIK", "CKD", "SMI", "SDM", "GAN", "SPL", "KLG", "KTZ", "BOO", "MRY", "GBI", "CKA", "KLB", "CBB", "PAR", "PSK", "CSK", "KTX", "STL", "CSL", "CKL", "CSN", "TAR", "DMG", "RKS", "KMG", "MRD", "PMU", "BBL", "LWD", "PAG", "TGR", "SPT", "KMT", "SUE", "JIA", "MLP", "MER", "JGL", "PPG", "SKJ", "CWI", "SRH", "CYI", "EJI", "GRL", "SAG", "BJO", "SMH", "BRS", "TJH", "LBU", "CAU", "CTR", "TJO", "JSA", "STN", "PBY", "KRS", "MUK", "SAM", "PSU", "CJU", "SKE", "PBN", "RMP", "CSE", "KJO", "TBL", "MEN", "CBG", "CGD", "DNI", "LBI", "MGB"];
    }
    public static function listAlasanDispatch() {
        // return ["Dispatch - RNA 3X", "Closed - by SCC", "Closed - by FCR ROC", "Closed - by MYI", "Dispatch - Malam", "Pelanggan Tidak Dapat kode SCC", "Dispatch - Gamas", "Dispatch - Caring NOK", "Dispatch - Logic ok no caring", "Dispatch - Petugas diminta datang", "Dispatch - Pelanggan reject close", "Dispatch - Redaman tinggi/LOS", "Dispatch - Tidak ada log", "Dispatch - Lain-lain", "Dispatch - oleh C4", "Dispatch - Fisik", "Dispatch - Tiket nyasar(ex @wifi.id/dll)", "Dispatch - Tiket NN (Kabel Terjuntai/Tiang Roboh)", "Dispatch - Provisioning", "Dispatch - Tidak berhasil diperbaiki disisi logic", "Dispatch - Isolir", "Disparch - Astinet", "Ex GAMAS", "Dispatch-PDD", "Dispatch-PDA", "DOUBLE TIKET", "Dispatch - Gangguan perangkat Telkom", "Handling - Piket Malem"];
        return ["dispatch","closed"];
    }
    public function logBefore()
    {
        return $this->hasOne(LogBeforeExecution::class, "ticket_id", "id");
    }
    public function logAfter()
    {
        return $this->hasOne(LogAfterExecution::class, "ticket_id", "id");
    }
}
