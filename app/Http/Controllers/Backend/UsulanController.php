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
use App\Imports\UsulanImport;
use App\Exports\UsulanExport;
use Maatwebsite\Excel\Facades\Excel;

class UsulanController extends Controller
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
        
        return view('backend.usulan.index', compact('usulans', 'hunians', 'jumlahHunian'));
    }

    public function add()
    {
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        $sumberdana = SumberDanaBantuan::all();
        return view('backend.usulan.add', compact('bentukBangunans',
            'statusKepemilikans', 'pendapatanKeluargas', 'kecamatans', 'sumberdana'));
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
        if(Auth::user()->role == 'pihak-ketiga'){
            $list = $list->where('pengusul_id', Auth::user()->id);
        }
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'dinas'){
            $list = $list->where('status', 1);
        }
        $list = $list->where('hunian_id', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
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

    public function export_excel()
    {
        return Excel::download(new UsulanExport, 'usulan.xlsx');
    }

    public function import_excel(Request $request) 
    {
            Excel::import (new UsulanImport, request()->file('file'));

            return back();
    }
}
