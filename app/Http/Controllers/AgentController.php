<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == "agent"){
            $agents = Agent::with("user")->where("user_id", auth()->user()->id)->get();
        }else{
            $agents = Agent::with("user")->get();
        }
      
       
        return view('admin.agent.index', compact('agents'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $user = User::create([
                "nama" => $data["nama_depan"] ." ".$data["nama_belakang"],
                "password" => bcrypt($data["password"]),
                "nik" =>  $data["nik"],
                "role" =>  "agent",
                "nomer_tlpn" => $data["nomer_hp"],
            ]);
            $data["manajer"] = Auth()->user()->id;
            $data["kordinator"] = Auth()->user()->id;
            $data["user_id"] = $user->id;
            $create = Agent::create($data);
            DB::commit();
            return response()->json(true);
    } catch (\Throwable $th) {
        DB::rollback();
        // return response()->json(false);
        return response()->json($th->getMessage());
        // throw $th->getMessage();
    }
    }
    public function destroy($id)
    {
        $agent = Agent::find($id);
        if ($agent) {
            User::find($agent->user_id)->delete();
            $agent->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $agent = Agent::find($id);
        return response()->json($agent);
    }
    public function update($id, Request $request)
    {
        $agent = Agent::find($id);
        $data = $request->except('_token');
        $agent->fill($data);
        if ($agent->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
