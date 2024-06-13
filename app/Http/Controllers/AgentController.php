<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendMailJob;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            $password = Str::random(8);
            $data = $request->except('_token');

                    //buat upload gambar
            if ($request->hasFile('avatar')) {
                if ($request->file('avatar')->isValid()) {
                    $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
                    $request->file('avatar')->move(public_path('assets/image/agent'), $fileName);
                    $data['avatar'] = "assets/image/agent/$fileName";
                }
            }

            $user = User::create([
                "nama" => $data["nama_depan"] ." ".$data["nama_belakang"],
                "password" => bcrypt($password),
                "nik" =>  $data["nik"],
                "role" =>  "agent",
            ]);
            $data["manajer"] = Auth()->user()->id;
            $data["kordinator"] = Auth()->user()->id;
            $data["user_id"] = $user->id;
            $data["password"] = $password;
            $create = Agent::create($data);
            DB::commit();

            //send email
            // dispatch(new SendMailJob($data));
            Mail::to($data["email"])->send(new SendEmail($data));
            
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

         if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                if (file_exists(public_path($agent->avatar) && $agent->avatar != null)) {
                    unlink(public_path($agent->avatar));
                }
                $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
                $request->file('avatar')->move(public_path('assets/image/agent'), $fileName);
                $data['avatar'] = "assets/image/agent/$fileName";
            }
        }
        $agent->fill($data);
        if ($agent->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function profile($id, Request $request) {
        $agent = Agent::where("user_id", $id)->first();
        return view('admin.agent.profile', compact('agent'));
    }
}
