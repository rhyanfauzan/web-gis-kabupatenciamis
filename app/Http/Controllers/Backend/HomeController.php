<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backlog;
use App\Models\Hunian;
use App\Models\KawasanBencana;
use App\Models\KawasanKumuh;
use App\Models\Sesi;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $jumlahPenduduk = Hunian::sum('jumlah_keluarga');
        $jumlahHunian = Hunian::count();
        $jumlahTidakLayakHuni = Hunian::where('layak_huni', 't')->count();
        $statusKepemilikans = [];
        $bantuanHunian = [];
        $total_kawasan_kumuh = KawasanKumuh::count();
        $total_kawasan_bencana = KawasanBencana::count();
        $data = KawasanKumuh::get();
        $total_luas_area = $data->sum('luas_area');
        $data_backlog = Backlog::get();

        for ($i = 1; $i < 4; $i++)
        {
            $statusKepemilikans[] = Hunian::where('status_kepemilikan_id', $i)->count();
            
        }
        for ($i=1; $i <5; $i++) { 
            $bantuanHunian[] = Usulan::where('sumber_dana_bantuan_id', $i)->where('status', 1)->count();
        }

        $date = '2021-01-01';
        $date2 = '2021-12-30';
        $backlogs[] = Backlog::whereBetween('tgl', [$date, $date2])->get()->sum('backlog');

        $date = '2022-01-01';
        $date2 = '2022-12-30';
        $backlogs[] = Backlog::whereBetween('tgl', [$date, $date2])->get()->sum('backlog');

        $date = '2023-01-01';
        $date2 = '2023-12-30';
        $backlogs[] = Backlog::whereBetween('tgl', [$date, $date2])->get()->sum('backlog');

        $date = '2024-01-01';
        $date2 = '2024-12-30';
        $backlogs[] = Backlog::whereBetween('tgl', [$date, $date2])->get()->sum('backlog');

        $date = '2025-01-01';
        $date2 = '2025-12-30';
        $backlogs[] = Backlog::whereBetween('tgl', [$date, $date2])->get()->sum('backlog');

        $bentukBangunans = [];
        for ($i = 1; $i < 6; $i++)
        {
            $bentukBangunans[] = Hunian::where('bentuk_bangunan_id', $i)->count();
        }

        $bentukBangunans = [];
        for ($i = 1; $i < 6; $i++)
        {
            $bentukBangunans[] = Hunian::where('bentuk_bangunan_id', $i)->count();
        }

        $terhubungListrik = Hunian::where('tersedia_listrik', 'y')->count();
        $persentaseTerhubungListrik = $jumlahHunian > 0 ? ($terhubungListrik / $jumlahHunian) * 100 : 0;
        return view('backend.home.index', compact('jumlahPenduduk',
            'jumlahHunian', 'jumlahTidakLayakHuni', 'statusKepemilikans',
            'bentukBangunans', 'persentaseTerhubungListrik', 'total_kawasan_kumuh', 'total_kawasan_bencana', 'total_luas_area', 'backlogs', 'bantuanHunian'));
    }

    public function logout(Request $request)
    {
        $user_id = Auth::user()->id;

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('frontpage.login.index');
    }

    public function ubahPassword()
    {

    }

    public function doUbahPassword(Request $request)
    {

    }
}
