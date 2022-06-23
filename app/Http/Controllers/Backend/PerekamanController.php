<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BentukBangunan;
use App\Models\Hunian;
use App\Models\KawasanKumuh;
use App\Models\Kecamatan;
use App\Models\PendapatanKeluarga;
use App\Models\StatusKepemilikan;
use App\Models\SumberDanaBantuan;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Imports\HunianImport;
use App\Exports\HunianExport;
use Maatwebsite\Excel\Facades\Excel;

class PerekamanController extends Controller
{
    public function index()
    {
        $jumlahHunian = Hunian::count();
        // if(Auth::user()->role == 'admin'){
        $hunians = Hunian::get();
        // }
        // else{
        //     $hunians = Hunian::where('penginput_id', Auth::user()->id)->get();
        // }
        $usulans = [];
        for ($i = 1; $i <= 4; $i++)
        {
            $usulans[] = Usulan::where('sumber_dana_bantuan_id', $i)->count();
        }
        $jumlahRumahLayakHuni = Hunian::where('layak_huni', 'y')->count();
        $jumlahRumahTidakLayakHuni = Hunian::where('layak_huni', 't')->count();
        $statusKepemilikans = [];
        for ($i = 1; $i < 4; $i++) {
            $statusKepemilikans[] = Hunian::where('status_kepemilikan_id', $i)->count();
        }
        
        return view('backend.perekaman.index', compact('usulans', 'hunians', 'jumlahHunian', 'jumlahRumahLayakHuni', 'jumlahRumahTidakLayakHuni', 'statusKepemilikans'));
    }

    public function add()
    {
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        $sumberdana = SumberDanaBantuan::all();
        return view('backend.perekaman.add', compact('bentukBangunans',
            'statusKepemilikans', 'pendapatanKeluargas', 'kecamatans', 'sumberdana'));
    }

    public function insertFinal(Request $request)
    {
        try {
            $data = $request->input('hunian');
            $hunian = Hunian::create($data);
            $usulan = Usulan::create([
                'hunian_id' => $hunian->id,
                'pengusul_id' => Auth::user()->id,
                'foto_rumah' => $request->file('foto_rumah'),
                'foto_mck' => $request->file('foto_mck'),
                'verifikator_id' => Auth::user()->id,
                'sumber_dana_bantuan_id' => $request->input('sumber_dana_bantuan_id'),
                'rencana_tahun_penanganan' => $request->input('rencana_tahun_penanganan'),
                'nominal' => $request->input('nominal'),
                'status' => 3
            ]);

            return response()->json(
                [
                    'success' => true
                ]
            );

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
        return view('backend.perekaman.index');
    }

    public function insert(Request $request)
    {
        $usulanM = new Usulan();
        $usulanM->hunian_id = $request->hunian_id;
        $usulanM->sumber_dana_bantuan_id = $request->sumber_dana_bantuan_id;
        $usulanM->pengusul_id = Auth::user()->id;
        if(Auth::user()->role != 'pihak-ketiga') 
        {
            $usulanM->verifikator_id = Auth::user()->id;
            $usulanM->status = 1;
        }
        $usulanM->save();

        return response()->json([
            'success' => 'insert'
        ]);
    }

    public function getData(Request $request)
    {
        
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = Usulan::with('hunian','verifikator', 'pengusul', 'dinas');
        // if(Auth::user()->role == 'pihak-ketiga'){
        //     $list = $list->where('pengusul_id', Auth::user()->id);
        // }
        // if(Auth::user()->role == 'admin' || Auth::user()->role == 'dinas'){
        //     $list = $list->where('status', 1);
        // }
        $list = $list->where('status', 3)->where('hunian_id', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = Usulan::count();
        $recordsFiltered = Usulan::where('hunian_id', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function delete($id)
    {
        $item = Usulan::find($id);
        $item->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function geojson()
    {
        $all = Usulan::with('hunian')->get();
        $features = array();

        foreach($all as $item) {
            if(Auth::user()->id == $item->pengusul_id && Auth::user()->role == 'pihak-ketiga')
            {
                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => [$item->hunian->longitude, $item->hunian->latitude]),
                    'properties' => array('nama' => $item->hunian->nama_pemilik),
                );
            }
            else if (Auth::user()->role == 'admin' || Auth::user()->role == 'dinas'){
                if($item->status == 1){
                    $features[] = array(
                        'type' => 'Feature',
                        'geometry' => array('type' => 'Point', 'coordinates' => [$item->hunian->longitude, $item->hunian->latitude]),
                        'properties' => array('nama' => $item->hunian->nama_pemilik),
                    );
                }
            }
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }
}
