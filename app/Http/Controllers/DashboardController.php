<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    { 
        $totalClose = DB::select("SELECT agents.nama_depan, agents.nama_belakang,  agent_id, COUNT(*) AS total FROM tickets  INNER JOIN agents ON agents.id = tickets.agent_id WHERE tickets.status_tiket = 'close' group BY agent_id ORDER BY total DESC LIMIT 10");
        

        $nama = [];
        $total = [];
        foreach($totalClose as $key => $value) {
        array_push($nama, $value->nama_depan." ".$value->nama_belakang);  
        array_push($total, $value->total);  
        }

        return view('admin.dashboard', compact("nama","total"));
    }
}
