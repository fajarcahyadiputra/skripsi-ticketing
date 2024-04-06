<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::with("user")->get();
        return view('admin.agent.index', compact('agents'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data["user_id"] = Auth()->user()->id;
        $create = Agent::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $agent = Agent::find($id);
        if ($agent) {
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
