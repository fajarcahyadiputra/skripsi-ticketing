<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Agent;
use App\Models\LogAfterExecution;
use App\Models\LogBeforeExecution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TicketExport;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthNow = date("m");
        if(auth()->user()->role == "agent"){
            $tickets =Ticket::whereMonth('created_at', '=','05')->with("agent")->wherehas("agent", function($query) {
                $query->where("user_id", auth()->user()->id);
            })->whereMonth('created_at', '=',$monthNow)->get();
        }else{
            $tickets =Ticket::with("agent")->whereMonth('created_at', '=',$monthNow)->get();
        }
        // $kode_barang = Barang::generateKode();
        return view('admin.ticket.index', compact('tickets'));
    }
    public function create()
    {
        $agents = Agent::all();
        $listSTO = Ticket::listSTO();
        $listAlasanDispatch = Ticket::listAlasanDispatch();
        return view('admin.ticket.create_ticket', compact('agents','listSTO','listAlasanDispatch'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $ticket = Ticket::create($data);
            $data["ticket_id"] = $ticket->id;
            $logExecution = LogBeforeExecution::create($data);
            $logExecution = LogAfterExecution::create($data);
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
        $ticket =Ticket::find($id);
        if ($ticket) {
            // $logExecution = LogExecution::where("ticket_id", $id)->first();
            // $logExecutionDel = LogExecution::find($logExecution->id);

            // $logExecutionDel->delete();
            $ticket->delete();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    // public function show($id)
    // {
    //     $barang =Ticket::with('obat:satuan', 'supplier')->find($id);
    //     return response()->json($barang);
    // }
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $logExecution = LogBeforeExecution::where(["ticket_id" => $id])->first();
        $agents =Agent::all();
        $listSTO = Ticket::listSTO();
        $listAlasanDispatch = Ticket::listAlasanDispatch();

        return view('admin.ticket.edit_ticket', compact('ticket', 'logExecution', 'agents','listSTO','listAlasanDispatch'));
    }
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $ticket =Ticket::find($id);
            $data = $request->except('_token');
            $ticket->fill($data);
            $ticket->save();

            $logBeforeExecution = LogBeforeExecution::where("ticket_id", $id)->first();

            $logBeforeExecutionUpd = LogBeforeExecution::find($logBeforeExecution->id);
            $logBeforeExecutionUpd->fill($data);
            $logBeforeExecutionUpd->save();

            $logAfterExecution = LogAfterExecution::where("ticket_id", $id)->first();

            $logAfterExecutionUpd = LogAfterExecution::find($logAfterExecution->id);
            $logAfterExecutionUpd->fill($data);
            $logAfterExecutionUpd->save();

            DB::commit();
            return response()->json(true);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(false);
            // return response()->json($th->getMessage());
            //throw $th;
        }
    }
    public function afterExecution($id)
    {
        $ticket = Ticket::find($id);
        $logExecution = LogBeforeExecution::where(["ticket_id" => $id])->first();
        $agents =Agent::all();
        $listSTO = Ticket::listSTO();
        $listAlasanDispatch = Ticket::listAlasanDispatch();

        return view('admin.ticket.afterExecution', compact('ticket', 'logExecution', 'agents','listSTO','listAlasanDispatch'));
    }
    public function storeAfterExecution()
    {
        $data = request()->except('_token');
        $ticket = Ticket::find($data['ticket_id']);
        $isLogAfterExecution = LogAfterExecution::where(["ticket_id" => $ticket->id])->exists();
       
        try {
        if($isLogAfterExecution){
            $logAfterExecution = LogAfterExecution::where(["ticket_id" => $ticket->id])->first();
            $logAfterExecutionUpd = LogAfterExecution::find($logAfterExecution->id);
            $logAfterExecutionUpd->fill($data);
            $logAfterExecutionUpd->save();
        }else{
            $store = LogAfterExecution::create($data);
        }
        $status = explode("-",trim($data["alasan_dispatch"]));
        $ticket = Ticket::find($data['ticket_id']);
        $data = request()->except('_token');
        $ticket->fill(["status_tiket" => $status[0]]);
        $ticket->save();
        DB::commit();
        return response()->json(true);
        } catch (\Throwable $th) {
            DB::rollBack();
            // return response()->json(false);
            return response()->json($th->getMessage());
            //throw $th;
        }
    }
    public function detail($id)
    {
        $ticket = Ticket::find($id);
        $logExecution = LogBeforeExecution::where(["ticket_id" => $id])->first();
        $logAfterExecution = LogAfterExecution::where(["ticket_id" => $ticket->id])->first();
        $agents =Agent::all();
        $listSTO = Ticket::listSTO();
        $listAlasanDispatch = Ticket::listAlasanDispatch();

        return view('admin.ticket.detail', compact('ticket', 'logExecution', 'agents','listSTO','listAlasanDispatch','logAfterExecution'));
    }
    public function exportExcel(){
        $startDate = Request()->input("start_date");
        $endDate = Request()->input("end_date");
        // $startDate = "2021-06-01";
        // $endDate = "2021-06-01";
        return Excel::download(new TicketExport(["start_date" => $startDate, "end_date" => $endDate]), 'ticket.xlsx');
    }
}
