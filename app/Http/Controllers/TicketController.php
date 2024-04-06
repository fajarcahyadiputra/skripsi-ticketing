<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\LogCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat_masuk =Ticket::all();
        // $kode_barang = Barang::generateKode();
        return view('admin.obat_masuk.index', compact('obat_masuk'));
    }
    public function create()
    {
        return view('admin.obat_masuk.create_obat_masuk');
    }
    // public function store(Request $request)
    // {
    //     if ($request->input('checkStok')) {
    //         $kode_obat = $request->input('kode_obat');
    //         $obat = Obat::with("satuan")->find($kode_obat);
    //         return response()->json($obat);
    //     }
    //     try {
    //         DB::beginTransaction();
    //         $data = $request->except('_token');
    //         $obat = Obat::find($data['kode_obat']);
    //        Ticket::create($data);
    //         $obat->fill([
    //             'jumlah' => $data['jumlah'] + $obat->jumlah
    //         ]);
    //         $obat->save();
    //         DB::commit();
    //         return response()->json(true);
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return response()->json($th->getMessage());
    //         // throw $th->getMessage();
    //     }
    // }
    // public function destroy($id)
    // {
    //     $obatMasuk =Ticket::find($id);
    //     if ($obatMasuk) {
    //         $obat = Obat::find($obatMasuk->kode_obat);
    //         $total = $obat->jumlah - $obatMasuk->jumlah;
    //         Obat::where('kode_obat', $obatMasuk->kode_obat)->update([
    //             'jumlah' => $total
    //         ]);
    //         $obatMasuk->delete();
    //         return response()->json(true);
    //     } else {
    //         return response()->json(true);
    //     }
    // }
    // public function show($id)
    // {
    //     $barang =Ticket::with('obat:satuan', 'supplier')->find($id);
    //     return response()->json($barang);
    // }
    // public function edit($id)
    // {
    //     $obat = Obat::all();
    //     $supplier = Supplier::all();
    //     $obatMasuk =Ticket::find($id);
    //     $satuans = Satuan::all();
    //     return view('admin.obat_masuk.edit_obat_masuk', compact('obat', 'supplier', 'obatMasuk', 'satuans'));
    // }
    // public function update($id, Request $request)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $obatMasuk =Ticket::find($id);
    //         $data = $request->except('_token');
    //         $obatMasuk->fill($data);
    //         $obatMasuk->save();

    //         $obat = Obat::find($data['kode_obat']);
    //         $data['jumlah_sebelumnya'] = $data['total_stok'];
    //         $obat->fill([
    //             'jumlah' => $data['total_stok']
    //         ]);
    //         $obat->save();
    //         DB::commit();
    //         return response()->json(true);
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         return response()->json(true);
    //         //throw $th;
    //     }
    // }
}
