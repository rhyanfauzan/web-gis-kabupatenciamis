<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PenerimaBantuan;
use App\Models\Usulan;
use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    //
    public function index()
    {
        return view('backend.penerima-bantuan.index');
    }

    public function edit($id)
    {
        $item = Usulan::with('hunian.desa.kecamatan', 'verifikator', 'pengusul', 'dinas', 'penerimaBantuans')->where('id', $id)->first();
        return view('backend.penerima-bantuan.edit', compact('item'));
    }


    public function tambahFoto($id)
    {
        $item = Usulan::find($id);
        return view('backend.penerima-bantuan.foto', compact('item'));
    }

    public function updateFoto($id, Request $request)
    {

        try {
            $item = Usulan::where('id', $id)->first();
            $item->foto_rumah = $request->input('foto_rumah');
            $item->foto_mck = $request->input('foto_mck');
            // $item->status = 3;
            // $item->fill($request->only(
            //     'foto_rumah',
            //     'foto_mck'));
            $item->save();
            
            return response()->json(['success' => true]);

            // return redirect()->route('backend.hasilPelaksanaan.index');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = Usulan::with('hunian', 'verifikator', 'pengusul', 'dinas', 'penerimaBantuans')->where('status', 1)->whereNotNull('verifikator_id')->where('hunian_id', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = Usulan::where('status', 1)->whereNotNull('verifikator_id')->count();
        $recordsFiltered = Usulan::where('status', 1)->whereNotNull('verifikator_id')->where('hunian_id', 'like', "%$searchValue%")->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function update($id, Request $request)
    {
        // $item = PenerimaBantuan::where('usulan_id', $id)->first();
        // if (!$item)
        // {
        //     $item = new PenerimaBantuan;
        //     $item->usulan_id = $id;
        // }

        try {
            $item = Usulan::where('id', $id)->first();
            $item->rencana_tahun_penanganan = $request->input('rencana_tahun_penanganan');
            $item->nominal = $request->input('nominal');
            // $item->fill($request->only(var_dump($e->getMessage());
            //     'rencana_tahun_penanganan',
            //     'nominal'));
            $item->save();
            return view('backend.penerima-bantuan.index');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
