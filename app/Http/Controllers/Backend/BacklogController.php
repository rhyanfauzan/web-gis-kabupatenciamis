<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backlog;
use App\Models\BentukBangunan;
use App\Models\KawasanBencana;
use App\Models\Kecamatan;
use App\Models\PendapatanKeluarga;
use App\Models\StatusKepemilikan;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    public function index()
    {
        $data = Backlog::get();
        $result['jumlah_kk'] = $data->sum('jumlah_kk');
        $result['jumlah_penduduk'] = $data->sum('jumlah_penduduk');
        $result['jumlah_rumah'] = $data->sum('jumlah_rumah');
        $result['backlog'] = $data->sum('backlog');

        return view('backend.backlog.index', $result);
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = Backlog::with('kecamatan')->where('jumlah_kk', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = Backlog::count();
        $recordsFiltered = Backlog::where('jumlah_kk', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function add()
    {
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        return view('backend.backlog.add', compact('bentukBangunans',
            'statusKepemilikans', 'pendapatanKeluargas', 'kecamatans'));
    }

    public function delete($id)
    {
        $item = Backlog::find($id);
        $item->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        Backlog::create($data);

        return response()->json(['message' => 'success']);
    }

    public function edit($id)
    {
        $result['data'] = Backlog::find($id);
        $result['kecamatans'] = Kecamatan::all();
        $result['menu'] = 'edit';

        return view('backend.backlog.add', $result);
    }

    public function update(Request $request)
    {
        $kawasanBencanaM = Backlog::find($request->id);
        $kawasanBencanaM->kecamatan_id = $request->kecamatan_id;
        $kawasanBencanaM->jumlah_kk = $request->jumlah_kk;
        $kawasanBencanaM->jumlah_penduduk = $request->jumlah_penduduk;
        $kawasanBencanaM->jumlah_rumah = $request->jumlah_rumah;
        $kawasanBencanaM->kebutuhan_rumah = $request->kebutuhan_rumah;
        $kawasanBencanaM->tgl = $request->tgl;
        $kawasanBencanaM->backlog = $request->backlog;
        $kawasanBencanaM->save();

        return response()->json(['message' => 'success']);
    }
}
