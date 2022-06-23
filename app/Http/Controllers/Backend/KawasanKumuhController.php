<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backlog;
use App\Models\BentukBangunan;
use App\Models\Hunian;
use App\Models\KawasanKumuh;
use App\Models\Kecamatan;
use App\Models\PendapatanKeluarga;
use App\Models\StatusKepemilikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class KawasanKumuhController extends Controller
{
    public function index()
    {
        $data = KawasanKumuh::get();
        $result['total_luas_area'] = $data->sum('luas_area');
        $result['total_kawasan_kumuh'] = KawasanKumuh::count();
        return view('backend.kawasankumuh.index', $result);
    }


    public function add()
    {
        $judul = 'Tambah Kawasan Kumuh';
        $subjudul = 'Tambah';
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        return view('backend.kawasankumuh.add', compact('bentukBangunans',
            'statusKepemilikans', 'pendapatanKeluargas', 'kecamatans', 'judul', 'subjudul'));
    }

    public function edit($id)
    {
        $result['judul'] = 'Edit Kawasan Kumuh';
        $result['subjudul'] = 'Edit';
        $result['data'] = KawasanKumuh::find($id);
        $result['bentukBangunans'] = BentukBangunan::all();
        $result['statusKepemilikans'] = StatusKepemilikan::all();
        $result['pendapatanKeluargas'] = PendapatanKeluarga::all();
        $result['kecamatans'] = Kecamatan::all();
        $result['menu'] = 'edit';
        return view('backend.kawasankumuh.add', $result);
    }

    public function update(Request $request)
    {
        $kawasanKumuh = KawasanKumuh::find($request->id_kawasan_kumuh);
        $kawasanKumuh->nama_area = $request->nama_area;
        $kawasanKumuh->kecamatan_id = $request->kecamatan_id;
        $kawasanKumuh->desa_id = $request->desa_id;
        $kawasanKumuh->luas_area = $request->luas_area;

        if($request->foto_lokasi != '' || $request->foto_lokasi != null){
            //Delete And Replace File
            $kawasanKumuh->foto_lokasi = str_replace("storage","public", $kawasanKumuh->foto_lokasi);
            Storage::delete($kawasanKumuh->foto_lokasi);
            $kawasanKumuh->foto_lokasi = $request->foto_lokasi;
        }
        if(json_encode($request->koordinat) == null)
        {
            $kawasanKumuh->koordinat = $request->koordinat;
            $kawasanKumuh->jenis_koordinat = $request->jenis_koordinat;
        }
        $kawasanKumuh->save();
        return response()->json([
            'success' => $kawasanKumuh
        ]);
    }
    
    public function insert(Request $request)
    {
        $data = $request->all();
        KawasanKumuh::create($data);
        return response()->json([
            'success' => true
        ]);
    }

    public function geojson_point()
    {
        $all = KawasanKumuh::all();
        $features = array();

        foreach ($all as $item) {
            if($item->longitude == 0 || $item->latitude == 0) continue;
                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => [$item->longitude, $item->latitude]),
                    'properties' => $item->only('nama_area'),
                );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }

    public function geojson()
    {
        $all = KawasanKumuh::all();
        $features = array();

        foreach($all as $item) {

            $features[] = array(
                'type' => 'Feature',
                'geometry' => array('type' => $item->jenis_koordinat, 'coordinates' => json_decode($item->koordinat)),
                'properties' => array('kode' => $item->id, 'nama' => $item->nama_area),
            );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = KawasanKumuh::with('kecamatan','desa')->where('nama_area', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = KawasanKumuh::count();
        $recordsFiltered = KawasanKumuh::where('nama_area', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function delete($id)
    {
        $item = KawasanKumuh::find($id);
        $item->foto_lokasi = str_replace("storage","public", $item->foto_lokasi);
        Storage::delete($item->foto_lokasi);
        $item->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
