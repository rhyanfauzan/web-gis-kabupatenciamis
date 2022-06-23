<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\KawasanKumuh;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    //
    public function all($kecamatan_id)
    {
        $items = Desa::where('kecamatan_id', $kecamatan_id)->get();

        return response()->json($items);
    }

    public function index()
    {
        $data = KawasanKumuh::get();
        $result['total_luas_area'] = $data->sum('luas_area');
        $result['total_desa'] = Desa::count();
        return view('backend.desa.index', $result);
    }

    public function geojson()
    {
        $all = Desa::all();
        $features = array();

        foreach($all as $item) {
            
            if($item->koordinat != '""'){
                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => $item->jenis_koordinat, 'coordinates' => json_decode($item->koordinat)),
                    'properties' => $item->only('kode', 'nama'),
                );
            }
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }
}
