<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FotoPrasaranaSaranaUmum;
use App\Models\Kecamatan;
use App\Models\PrasaranaSaranaUmum;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class PrasaranaSaranaUmumController extends Controller
{
    //
    public function index()
    {
        return view('backend.prasarana-sarana-umum.index');
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = PrasaranaSaranaUmum::with('desa', 'kecamatan')->where('nama', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = PrasaranaSaranaUmum::count();
        $recordsFiltered = PrasaranaSaranaUmum::where('nama', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);

    }

    public function detail($id)
    {
        $item = PrasaranaSaranaUmum::with('desa', 'kecamatan', 'fotoPrasaranaSaranaUmums')->where('id', $id)->first();
        return view('backend.prasarana-sarana-umum.detail', compact('item'));
    }


    public function add()
    {
        $kecamatans = Kecamatan::all();
        return view('backend.prasarana-sarana-umum.add', compact('kecamatans'));
    }

    public function edit($id)
    {
        $kecamatans = Kecamatan::all();
        $subjudul = 'Edit';
        $item = PrasaranaSaranaUmum::with('fotoPrasaranaSaranaUmums')->where('id', $id)->first();
        return view('backend.prasarana-sarana-umum.edit', compact('item', 'kecamatans','subjudul'));
    }

    public function insert(Request $request)
    {
        $data = $request->only('kecamatan_id', 'desa_id', 'nama', 'keterangan');
        $item = new PrasaranaSaranaUmum;
        $item->fill($data);
        $item->lokasi = new Point($request->get('latitude'), $request->get('longitude'));
        $item->save();

        $fotoPrasaranas = $request->get('fotoPrasaranas');
        if (gettype($fotoPrasaranas) == 'string')
        {
            $fotoPrasaranas = json_decode($request->get('fotoPrasaranas'));
        }

        $fotoSaranas = $request->get('fotoSaranas');
        if (gettype($fotoSaranas) == 'string')
        {
            $fotoSaranas = json_decode($request->get('fotoSaranas'));
        }

        $fotoUtilitases = $request->get('fotoUtilitases');
        if (gettype($fotoUtilitases) == 'string')
        {
            $fotoUtilitases = json_decode($request->get('fotoUtilitases'));
        }
        
        foreach ((array) $fotoPrasaranas as $foto)
        {
            $keterangan = $foto['keterangan'] ?? '-';
            FotoPrasaranaSaranaUmum::create([
                'prasarana_sarana_umum_id' => $item->id,
                'jenis' => $foto['jenis'],
                'foto' => $foto['foto'],
                'keterangan' => $keterangan
            ]);
        }

        foreach ((array) $fotoSaranas as $foto)
        {
            $keterangan = $foto['keterangan'] ?? '-';
            FotoPrasaranaSaranaUmum::create([
                'prasarana_sarana_umum_id' => $item->id,
                'jenis' => $foto['jenis'],
                'foto' => $foto['foto'],
                'keterangan' => $keterangan
            ]);
        }

        foreach ((array) $fotoUtilitases as $foto)
        {
            $keterangan = $foto['keterangan'] ?? '-';
            FotoPrasaranaSaranaUmum::create([
                'prasarana_sarana_umum_id' => $item->id,
                'jenis' => $foto['jenis'],
                'foto' => $foto['foto'],
                'keterangan' => $keterangan
            ]);
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function update($id, Request $request)
    {
        $data = $request->only('kecamatan_id', 'desa_id', 'nama', 'keterangan');
        $item = PrasaranaSaranaUmum::find($id);
        $item->fill($data);
        $item->lokasi = new Point($request->get('latitude'), $request->get('longitude'));
        $item->save();

        $fotoPrasaranas = $request->get('fotoPrasaranas');
        if (gettype($fotoPrasaranas) == 'string')
        {
            $fotoPrasaranas = json_decode($request->get('fotoPrasaranas'));
        }

        $fotoSaranas = $request->get('fotoSaranas');
        if (gettype($fotoSaranas) == 'string')
        {
            $fotoSaranas = json_decode($request->get('fotoSaranas'));
        }

        $fotoUtilitases = $request->get('fotoUtilitases');
        if (gettype($fotoUtilitases) == 'string')
        {
            $fotoUtilitases = json_decode($request->get('fotoUtilitases'));
        }

        foreach ((array) $fotoPrasaranas as $foto)
        {
            if (isset($foto['id']) && $foto['id'] != '')
            {
                if ($foto['foto'] == '')
                {
                    FotoPrasaranaSaranaUmum::where('id', $foto['id'])->delete();
                } else
                {
                    $keterangan = $foto['keterangan'] ?? '-';
                    FotoPrasaranaSaranaUmum::where('id', $foto['id'])
                        ->update([
                            'prasarana_sarana_umum_id' => $item->id,
                            'jenis' => $foto['jenis'],
                            'foto' => $foto['foto'],
                            'keterangan' => $keterangan
                        ]);
                }
            } else
            {
                $keterangan = $foto['keterangan'] ?? '-';
                FotoPrasaranaSaranaUmum::create([
                    'prasarana_sarana_umum_id' => $item->id,
                    'jenis' => $foto['jenis'],
                    'foto' => $foto['foto'],
                    'keterangan' =>$keterangan
                ]);
            }
        }

        foreach ((array) $fotoSaranas as $foto)
        {
            if (isset($foto['id']) && $foto['id'] != '')
            {
                if ($foto['foto'] == '')
                {
                    FotoPrasaranaSaranaUmum::where('id', $foto['id'])->delete();
                } else
                {
                    $keterangan = $foto['keterangan'] ?? '-';
                    FotoPrasaranaSaranaUmum::where('id', $foto['id'])
                        ->update([
                            'prasarana_sarana_umum_id' => $item->id,
                            'jenis' => $foto['jenis'],
                            'foto' => $foto['foto'],
                            'keterangan' => $keterangan
                        ]);
                }
            } else
            {
                $keterangan = $foto['keterangan'] ?? '-';
                FotoPrasaranaSaranaUmum::create([
                    'prasarana_sarana_umum_id' => $item->id,
                    'jenis' => $foto['jenis'],
                    'foto' => $foto['foto'],
                    'keterangan' => $keterangan
                ]);
            }
        }

        foreach ((array) $fotoUtilitases as $foto)
        {
            if (isset($foto['id']) && $foto['id'] != '')
            {
                if ($foto['foto'] == '')
                {
                    FotoPrasaranaSaranaUmum::where('id', $foto['id'])->delete();
                } else
                {
                    $keterangan = $foto['keterangan'] ?? '-';
                    FotoPrasaranaSaranaUmum::where('id', $foto['id'])
                        ->update([
                            'prasarana_sarana_umum_id' => $item->id,
                            'jenis' => $foto['jenis'],
                            'foto' => $foto['foto'],
                            'keterangan' => $keterangan
                        ]);
                }
            } else
            {
                $keterangan = $foto['keterangan'] ?? '-';
                FotoPrasaranaSaranaUmum::create([
                    'prasarana_sarana_umum_id' => $item->id,
                    'jenis' => $foto['jenis'],
                    'foto' => $foto['foto'],
                    'keterangan' => $keterangan
                ]);
            }
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function delete($id, Request $request)
    {
        $prasaranaM = PrasaranaSaranaUmum::find($id);
        $prasaranaM->delete();
        $fotoPrasaranaM = FotoPrasaranaSaranaUmum::where('prasarana_sarana_umum_id', $id)->get();

        foreach($fotoPrasaranaM as $row)
        {
            $data = FotoPrasaranaSaranaUmum::find($row->id);
            $data->delete();
        }

    }

    public function geojson()
    {
        $all = PrasaranaSaranaUmum::all();
        $features = array();

        foreach($all as $item) {

            $features[] = array(
                'type' => 'Feature',
                'geometry' => $item->lokasi,
                'properties' => $item->only('nama'),
            );
        };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return response()->json($allfeatures);
    }

}
