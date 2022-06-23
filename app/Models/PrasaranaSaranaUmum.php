<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrasaranaSaranaUmum extends Model
{
    use HasFactory, SoftDeletes, SpatialTrait;

    protected $fillable = ['kecamatan_id', 'desa_id', 'nama', 'keterangan'];

    protected $spatialFields = ['lokasi'];

    public function fotoPrasaranaSaranaUmums()
    {
        return $this->hasMany(FotoPrasaranaSaranaUmum::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
