<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $table = 'perumahan';
    protected $fillable = [
        'nama_perum',
        'no_imb',
        'tgl_imb',
        'tahun',
        'pengembang',
        'perusahaan',
        'almt_perusahaan',
        'jml_rmh_komersil',
        'jml_rmh_mbr'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
