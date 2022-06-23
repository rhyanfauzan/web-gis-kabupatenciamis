<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bencana;
use App\Models\BentukBangunan;
use App\Models\Hunian;
use App\Models\KawasanBencana;
use App\Models\Kecamatan;
use App\Models\PendapatanKeluarga;
use App\Models\StatusKepemilikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class AreaRawanBencanaController extends Controller
{
    public function index()
    {
        $countBencana = KawasanBencana::count();
        $jumlahRumahTidakLayakHuni = Hunian::where('layak_huni', 't')->count();
        $statusKepemilikans = [];
        for ($i = 1; $i < 4; $i++)
        {
            $statusKepemilikans[] = Hunian::where('status_kepemilikan_id', $i)->count();
        }
        $tipebencanas = [];
        for ($i = 1; $i < 6; $i++)
        {
            $tipebencanas[] = KawasanBencana::where('bencana_id', $i)->count();
        }

        return view('backend.rawan-bencana.index', compact('countBencana', 'jumlahRumahTidakLayakHuni', 'statusKepemilikans', 'tipebencanas'));
    }

    public function add()
    {
        $result['bentukBangunans'] = BentukBangunan::all();
        $result['statusKepemilikans'] = StatusKepemilikan::all();
        $result['pendapatanKeluargas'] = PendapatanKeluarga::all();
        $result['kecamatans'] = Kecamatan::all();
        $result['bencanas'] = Bencana::all();
        return view('backend.rawan-bencana.add', $result);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        KawasanBencana::create($data);

        return response()->json(['message' => 'success']);
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = KawasanBencana::with('desa', 'kecamatan')->where('nama_area', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = KawasanBencana::count();
        $recordsFiltered = KawasanBencana::where('nama_area', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function geojson()
    {
        $all = KawasanBencana::all();
        $features = array();

        foreach($all as $item) {

            $features[] = array(
                'type' => 'Feature',
                'geometry' => array('type' => 'Point', 'coordinates' => [$item->longitude, $item->latitude]),
                'properties' => array('kode' => $item->id, 'nama' => $item->nama_area),
            );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }

    public function delete($id)
    {
        $item = KawasanBencana::find($id);
        $item->foto_lokasi = str_replace("storage","public", $item->foto_lokasi);
        Storage::delete($item->foto_lokasi);
        $item->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function edit($id)
    {
        $result['data'] = KawasanBencana::find($id);
        $result['bentukBangunans'] = BentukBangunan::all();
        $result['statusKepemilikans'] = StatusKepemilikan::all();
        $result['pendapatanKeluargas'] = PendapatanKeluarga::all();
        $result['kecamatans'] = Kecamatan::all();
        $result['bencanas'] = Bencana::all();
        $result['menu'] = 'edit';
        return view('backend.rawan-bencana.add', $result);
    }

    public function update(Request $request)
    {
        $kawasanBencanaM = KawasanBencana::find($request->id_kawasan);
        $kawasanBencanaM->nama_area = $request->nama_area;
        $kawasanBencanaM->estimasi_waktu_bencana = $request->estimasi_waktu_bencana;
        if($request->foto_lokasi != '' || $request->foto_lokasi != null){
            //Delete And Replace File
            $kawasanBencanaM->foto_lokasi = str_replace("storage","public", $kawasanBencanaM->foto_lokasi);
            Storage::delete($kawasanBencanaM->foto_lokasi);
            $kawasanBencanaM->foto_lokasi = $request->foto_lokasi;
        }
        $kawasanBencanaM->bencana_id = $request->bencana_id;
        $kawasanBencanaM->kecamatan_id = $request->kecamatan_id;
        $kawasanBencanaM->desa_id = $request->desa_id;

        //Cek Jika Titik Diperbarui
        if($request->latitude != 0 || $request->foto_lokasi != null){
            $kawasanBencanaM->latitude = $request->latitude;
            $kawasanBencanaM->longitude = $request->longitude;
        }
        
        $kawasanBencanaM->luas_area = $request->luas_area;
        $kawasanBencanaM->jumlah_rumah_terdampak = $request->jumlah_rumah_terdampak;
        $kawasanBencanaM->save();
        return response()->json([
            'success' => $kawasanBencanaM
        ]);
    }
}
