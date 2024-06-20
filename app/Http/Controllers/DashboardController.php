<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $dateNow = date("m");
        $totalClose = DB::select("SELECT users.nama_depan, users.nama_belakang,  user_id, COUNT(*) AS total FROM tickets  INNER JOIN users ON users.id = tickets.user_id WHERE tickets.status_tiket = 'closed' AND MONTH(tickets.created_at) = ".$dateNow." AND tickets.deleted_at IS NULL group BY user_id ORDER BY total DESC LIMIT 10");
        

        $nama = [];
        $total = [];
        foreach($totalClose as $key => $value) {
        array_push($nama, $value->nama_depan." ".$value->nama_belakang);  
        array_push($total, $value->total);  
        }

        $users = User::all();

        return view('admin.dashboard', compact("nama","total","users"));
    }
}
