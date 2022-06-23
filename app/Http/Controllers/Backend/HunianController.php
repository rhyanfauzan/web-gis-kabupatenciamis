<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BentukBangunan;
use App\Models\Hunian;
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


class HunianController extends Controller
{
    //
    public function index()
    {
        $jumlahRumahLayakHuni = Hunian::where('layak_huni', 'y')->count();
        $jumlahRumahTidakLayakHuni = Hunian::where('layak_huni', 't')->count();
        $statusKepemilikans = [];
        for ($i = 1; $i < 4; $i++) {
            $statusKepemilikans[] = Hunian::where('status_kepemilikan_id', $i)->count();
        }
        return view('backend.hunian.index', compact('jumlahRumahLayakHuni', 'jumlahRumahTidakLayakHuni', 'statusKepemilikans'));
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = Hunian::with('desa')->where('nama_pemilik', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = Hunian::count();
        $recordsFiltered = Hunian::where('nama_pemilik', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function add()
    {
        $judul = 'Tambah Hunian';
        $subjudul = 'Tambah';
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        return view('backend.hunian.add', compact(
            'bentukBangunans',
            'statusKepemilikans',
            'pendapatanKeluargas',
            'kecamatans',
            'judul',
            'subjudul'
        ));
    }

    public function edit($id)
    {
        $judul = 'Edit Hunian';
        $subjudul = 'Edit';
        $item = Hunian::with('desa')->where('id',$id)->first();
        $data = Hunian::find($id);
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        return view('backend.hunian.add', compact(
            'item',
            'data',
            'bentukBangunans',
            'statusKepemilikans',
            'pendapatanKeluargas',
            'kecamatans',
            'judul',
            'subjudul'
        ));
    }

    public function indexPerekaman() 
    {
        $jumlahRumahLayakHuni = Hunian::where('layak_huni', 'y')->count();
        $jumlahRumahTidakLayakHuni = Hunian::where('layak_huni', 't')->count();
        $statusKepemilikans = [];
        for ($i = 1; $i < 4; $i++) {
            $statusKepemilikans[] = Hunian::where('status_kepemilikan_id', $i)->count();
        }
        return view('backend.perekaman.index', compact('jumlahRumahLayakHuni', 'jumlahRumahTidakLayakHuni', 'statusKepemilikans'));
    }

    public function addPerekaman()
    {
        $bentukBangunans = BentukBangunan::all();
        $statusKepemilikans = StatusKepemilikan::all();
        $pendapatanKeluargas = PendapatanKeluarga::all();
        $kecamatans = Kecamatan::all();
        return view('backend.perekaman.add', compact(
            'bentukBangunans',
            'statusKepemilikans',
            'pendapatanKeluargas',
            'kecamatans'
        ));
    }

    public function insertFinal(Request $request)
    {
            $hunian = Hunian::create([
                'desa_id' => $request->input('desa_id'),
                'status_kepemilikan_id' => $request->input('status_kepemilikan_id'),
                'bentuk_bangunan_id' => $request->input('bentuk_bangunan_id'),
                'pendapatan_keluarga_id' => $request->input('pendapatan_keluarga_id'),
                'foto_hunian' => $request->input('foto_hunian'),
                'luas_tanah' => $request->input('luas_tanah'),
                'luas_bangunan' => $request->input('luas_bangunan'),
                'tersedia_listrik' => $request->input('tersedia_listrik'),
                'dibangun_oleh_pengembang' => $request->input('dibangun_oleh_pengembang'),
                'memiliki_imb' => $request->input('memiliki_imb'),
                'nama_pengembang' => $request->input('nama_pengembang'),
                'nomor_imb' => $request->input('nomor_imb'),
                'foto_pemilik' => $request->input('foto_pemilik'),
                'nama_pemilik' => $request->input('nama_pemilik'),
                'nik_pemilik' => $request->input('nik_pemilik'),
                'no_kk_pemilik' => $request->input('no_kk_pemilik'),
                'tanggal_lahir_pemilik' => $request->input('tanggal_lahir_pemilik'),
                'no_telepon_pemilik' => $request->input('no_telepon_pemilik'),
                'email_pemilik' => $request->input('email_pemilik'),
                'jumlah_keluarga' => $request->input('jumlah_keluarga'),
                'alamat_detail' => $request->input('alamat_detail'),
                'kondisi_atap' => $request->input('kondisi_atap'),
                'kondisi_dinding' => $request->input('kondisi_dinding'),
                'kondisi_lantai' => $request->input('kondisi_lantai'),
                'kondisi_kamar_mandi' => $request->input('kondisi_kamar_mandi'),
                'kondisi_mck' => $request->input('kondisi_mck'),
                'kondisi_sumber_air_minum' => $request->input('kondisi_sumber_air_minum'),
                'septic_tank' => $request->input('septic_tank'),
                'luas_bangunan_perkapita' => $request->input('luas_bangunan_perkapita'),
            ]);
            if($hunian)
            {
                $usulan = Usulan::create([
                    'hunian_id' => $hunian->id,
                    'pengusul_id' => Auth::user()->id,
                    'foto_rumah' => $request->input('foto_rumah_final'),
                    'foto_mck' => $request->input('foto_mck_final'),
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
            }
            

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->getMessage()
        //     ]);
        // }
    }

    public function insert(Request $request)
    {
        try {
            $data = $request->all();
            // if(Auth::user()->role == 'pihak-ketiga'){
            //     $data['penginput_id'] = Auth::user()->id;
            // }
            // if(Auth::user()->role == 'admin' || Auth::user()->role == 'dinas'){
            //     $data['status'] = 1;
            // }
            $hunian = Hunian::create($data);
            // $usulan = new Usulan();
            // $usulan->hunian_id = $hunian->id;
            // $usulan->pengusul_id = Auth::user()->id;
            // $usulan->save();
            if(Auth::user()->role == 'pihak-ketiga'){
                $usulan = Usulan::create([
                    'hunian_id' => $hunian->id,
                    'pengusul_id' => Auth::user()->id,
                ]);
            }

            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            var_dump($e);
            die();
        }
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        Hunian::where('id', $id)->update($data);
        return response()->json([
            'success' => true
        ]);
    }

    public function delete($id)
    {
        $item = Hunian::find($id);
        if($item)
        {
            Usulan::where('hunian_id', $id)->delete();
            $item->delete();
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function geojson()
    {
        $all = Hunian::all();
        $features = array();

        foreach ($all as $item) {

                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => [$item->longitude, $item->latitude]),
                    'properties' => $item->only('nama_pemilik'),
                );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }

    public function cekKK(Request $request)
    {
        $data = Hunian::with('status_kepemilikan','desa')->where('no_kk_pemilik', $request->no_kk)->first();
        $data->desa->kecamatan;
        if($data)
            $data2 = Usulan::where("hunian_id", $data->id)->where("status", 1)->get();
        else
            $data2 = [];
        // $data2 = DB::select("SELECT A.*, C.no_kk_pemilik FROM penerima_bantuan A INNER JOIN usulan B ON A.usulan_id = B.id INNER JOIN hunians C ON B.hunian_id = C.id
        // WHERE TIMESTAMPDIFF(YEAR, A.created_at, CURRENT_TIMESTAMP) <= 5 && C.no_kk_pemilik = " . $request->no_kk . "");
        return response()->json([
            'success' => true,
            'data' => $data,
            'data2' => $data2
        ]);
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
