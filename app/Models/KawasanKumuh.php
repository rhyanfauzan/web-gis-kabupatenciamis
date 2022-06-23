<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KawasanKumuh extends Model
{
    use HasFactory;
    protected $table = 'kawasan_kumuh';
    protected $fillable = [
        'kecamatan_id',
        'desa_id',
        'nama_area',
        'foto_lokasi',
        'koordinat',
        'jenis_koordinat',
        'luas_area',
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
