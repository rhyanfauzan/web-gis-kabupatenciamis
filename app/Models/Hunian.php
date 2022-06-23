<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hunian extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'hunians';
    // protected $fillable = [
    //     'desa_id',
    //     'status_kepemilikan_id',
    //     'fisik_bangunan_id',
    //     'bentuk_bangunan_id',
    //     'pendapatan_keluarga_id',
    //     'foto_hunian',
    //     'luas_tanah',
    //     'luas_bangunan',
    //     'layak_huni',
    //     'tersedia_listrik',
    //     'dibangun_oleh_pengembang',
    //     'memiliki_imb',
    //     'nama_pengembang',
    //     'nomor_imb',
    //     'foto_pemilik',
    //     'nama_pemilik',
    //     'nik_pemilik',
    //     'no_kk_pemilik',
    //     'tanggal_lahir_pemilik',
    //     'no_telepon_pemilik',
    //     'email_pemilik',
    //     'jumlah_keluarga',
    //     'alamat_detail',
    //     'latitude',
    //     'longitude',
    //     'kondisi_atap',
    //     'kondisi_dinding',
    //     'kondisi_lantai',
    //     'kondisi_kamar_mandi',
    //     'kondisi_mck',
    //     'kondisi_sumber_air_minum',
    //     'septic_tank',
    //     'luas_bangunan_perkapita',
    //     'penginput_id',
    //     'status',
    // ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function status_kepemilikan()
    {
        return $this->belongsTo(StatusKepemilikan::class);
    }

    public function pendapatan_keluarga()
    {
        return $this->belongsTo(PendapatanKeluarga::class);
    }

    public function bentuk_bangunan()
    {
        return $this->belongsTo(BentukBangunan::class);
    }

}
