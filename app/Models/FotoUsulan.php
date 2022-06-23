<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoUsulan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['jenis_foto_usulan_id', 'usulan_id', 'foto', 'keterangan'];

    public function jenisFotoUsulan()
    {
        return $this->belongsTo(JenisFotoUsulan::class);
    }
}
