<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BentukBangunan;
use App\Models\Hunian;
use App\Models\Perumahan;
use App\Models\Kecamatan;
use App\Models\PendapatanKeluarga;
use App\Models\StatusKepemilikan;
use App\Models\SumberDanaBantuan;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Imports\HunianImport;
use App\Exports\HunianExport;
use Maatwebsite\Excel\Facades\Excel;


class PerumahanController extends Controller
{
    //
    public function index()
    {
        $data = Perumahan::get();
        $result['data'] = $data;

        return view('backend.perumahan.index', $result);
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = Perumahan::with('kecamatan')->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = Perumahan::count();
        $recordsFiltered = Perumahan::orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function add()
    {
        $judul = 'Tambah Perumahan';
        $subjudul = 'Tambah';
        $perumahan = Perumahan::all();
        $kecamatans = Kecamatan::all();
        return view('backend.perumahan.add', compact('perumahan', 'kecamatans', 'judul', 'subjudul'));
    }

    public function edit($id)
    {
        $judul = 'Edit Perumahan';
        $subjudul = 'Edit';
        $item = Perumahan::where('id',$id)->first();
        $kecamatans = Kecamatan::all();
        return view('backend.perumahan.edit', compact(
            'item',
            'kecamatans',
            'judul',
            'subjudul'
        ));
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        Perumahan::create($data);

        return $data;
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        Perumahan::where('id', $id)->update($data);
        return response()->json([
            'success' => true
        ]);
    }

    public function delete($id)
    {
        $item = Perumahan::find($id);
        $item->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function geojson()
    {
        $all = Perumahan::all();
        $features = array();

        foreach ($all as $item) {
                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => [$item->longitude, $item->latitude]),
                    'properties' => $item->only('nama_perum'),
                );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }
 

    public function export_excel()
    {
        return Excel::download(new HunianExport, 'hunian.xlsx');
    }

    public function import_excel(Request $request) 
    {
            Excel::import (new HunianImport, request()->file('file'));

            return back();
    }
}
