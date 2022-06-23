<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BentukBangunan;
use App\Models\Hunian;
use App\Models\Kecamatan;
use App\Models\PendapatanKeluarga;
use App\Models\PrasaranaSaranaUmum;
use App\Models\StatusKepemilikan;
use App\Models\SumberDanaBantuan;
use Illuminate\Http\Request;
use App\Models\Usulan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiUsulanController extends Controller
{

    public function index()
    {
        $jumlahHunian = Hunian::count();
        $hunians = Hunian::get();
        $usulans = [];
        for ($i = 1; $i <= 4; $i++) {
            $usulans[] = Usulan::where('sumber_dana_bantuan_id', $i)->count();
        }

        return view('backend.verifikasi-usulan.index', compact('usulans', 'hunians', 'jumlahHunian'));
    }

    public function sumberDanaBantuan()
    {
        $sumberDanaBantuans = SumberDanaBantuan::all();

        return response()->json(
            [
                'data' => $sumberDanaBantuans
            ]
        );
    }

    public function verify(Request $request)
    {
        try {
            $usulan = Usulan::find($request->input('id'));

            //Cek pernah menerima bantuan 5 tahun terakhir
            $hunian = Hunian::find($usulan->hunian_id);
            $pernah_menerima_bantuan = DB::select("SELECT A.*, C.no_kk_pemilik FROM penerima_bantuan A INNER JOIN usulan B ON A.usulan_id = B.id INNER JOIN hunians C ON B.hunian_id = C.id
            WHERE TIMESTAMPDIFF(YEAR, A.created_at, CURRENT_TIMESTAMP) <= 5 && C.no_kk_pemilik = " . $hunian->no_kk_pemilik . "");
            if ($pernah_menerima_bantuan != null) {
                return response()->json([
                    'success' => false
                ]);
            }

            $usulan->status = 1;
            $usulan->save();

            $usulan->verifikator_id = Auth::user()->id;
            if ($request->sumber_dana_bantuan_id) $usulan->sumber_dana_bantuan_id = $request->input('sumber_dana_bantuan_id');
            $usulan->status = $request->input('status');
            if ($request->pesan) $usulan->pesan = $request->input('pesan');
            $usulan->save();

            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response() ->json([
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

        $list = Usulan::with('hunian', 'verifikator', 'pengusul', 'dinas')->where('status', 0)->where('hunian_id', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = Usulan::count();
        $recordsFiltered = Usulan::where('hunian_id', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }


    public function geojson()
    {
        $all = Usulan::with('hunian')->where('status', 0)->get();
        $features = array();

        foreach ($all as $item) {
            $features[] = array(
                'type' => 'Feature',
                'geometry' => array('type' => 'Point', 'coordinates' => [$item->hunian->longitude, $item->hunian->latitude]),
                'properties' => array('nama' => $item->hunian->nama_pemilik),
            );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }

    public function detail($id)
    {
        $item = Usulan::with('hunian', 'hunian.desa', 'hunian.status_kepemilikan', 'hunian.pendapatan_keluarga', 'pengusul', 'hunian.bentuk_bangunan')->where('id', $id)->first();
        return view('backend.verifikasi-usulan.detail', compact('item'));
    }
}
