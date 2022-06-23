<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KawasanBencana extends Model
{
    use HasFactory;
    protected $table = 'kawasan_rawan_bencana';
    protected $fillable = [
        'nama_area',
        'foto_lokasi',
        'estimasi_waktu_bencana',
        'bencana_id',
        'kecamatan_id',
        'desa_id',
        'latitude',
        'longitude',
        'luas_area',
        'jumlah_rumah_terdampak',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
