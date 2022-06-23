<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    use HasFactory;
    protected $table = 'backlog';
    protected $fillable = [
        'kecamatan_id',
        'jumlah_kk',
        'jumlah_penduduk',
        'jumlah_rumah',
        'kebutuhan_rumah',
        'backlog',
        'tgl'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
