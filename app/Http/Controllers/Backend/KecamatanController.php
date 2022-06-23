<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KawasanKumuh;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    //

    public function index()
    {
        $data = KawasanKumuh::get();
        $result['total_luas_area'] = $data->sum('luas_area');
        $result['total_kecamatan'] = Kecamatan::count();
        return view('backend.kecamatan.index', $result);
    }
    
    public function geojson()
    {
        $all = Kecamatan::all();
        $features = array();

        foreach($all as $item) {

            $features[] = array(
                'type' => 'Feature',
                'geometry' => array('type' => $item->jenis_koordinat, 'coordinates' => json_decode($item->koordinat)),
                'properties' => $item->only('kode', 'nama'),
            );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }
}
