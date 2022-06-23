<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';
    protected $fillable = [
        'usulan_id',
        'rencana_tahun_penanganan',
        'nominal',
        'status'
    ];

    public function usulan()
    {
        return $this->belongsTo(Usulan::class);
    }
}
